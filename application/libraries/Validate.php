<?php

class Validate
{

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    function login_admin($param)
    {
        $param = array_map('trim', $param);
        if (!isset($param['email']) || empty($param['email']) || !_email($param['email']))
            return parameter_error_res("invalid_email");
        if (!isset($param['password']) || empty($param['password']))
            return parameter_error_res("password_missing");
        if (strlen($param['password']) < PASSWORD_MIN_LENGTH || strlen($param['password']) > PASSWORD_MAX_LENGTH)
            return parameter_error_res("password_min_max_length_violate", array(PASSWORD_MIN_LENGTH, PASSWORD_MAX_LENGTH));
        $interval_seconds = $this->CI->settings['unlock_login_interval'] * 3600; // hours to seconds
        $unlock_time = time() - $interval_seconds;
        $where = "is_ignore = 0 AND on_date > {$unlock_time}";
        $data = $this->CI->mylib->get_activity("login_try", ip(), "admin", $this->CI->settings['no_of_login_attampt'], $where);
        if (isset($data['data'][0]) && $data['statuscode'] == 1 && !empty($data['data'][0])) {
            if ($this->CI->settings['no_of_login_attampt'] < count($data['data']) + 1) {
                return spamer_res("too_much_attempt", array($this->CI->settings['unlock_login_interval']));
            }
        }

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function forgot_password_admin($param)
    {
        $param = array_map('trim', $param);
        if (!isset($param['email']) || empty($param['email']) || !_email($param['email']))
            return parameter_error_res("invalid_email");

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    // User Module
    function signUp($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("type", $keys) || !in_array($param['type'], array(1, 2, 3)))
            return parameter_error_res("invalid_type_of_login_signup");
        if (in_array("email", $keys) && empty($param['email']))
            return parameter_error_res("email_missing");
        if (in_array("email", $keys) && !_email($param['email']))
            return parameter_error_res("invalid_email");
        $type = isset($param['type']) ? $param['type'] : 0;
        if ($type == 1) { // SigUp With Email & Password
            if (!in_array("email", $keys) || empty($param['email']))
                return parameter_error_res("email_missing");
            if ($this->CI->model_user->emailExist($param['email']))
                return parameter_error_res("email_exist");
            if (!in_array("password", $keys) || empty($param['password']))
                return parameter_error_res("password_missing");
            if (strlen($param['password']) < PASSWORD_MIN_LENGTH)
                return parameter_error_res("password_min_max_length_violate", array(PASSWORD_MIN_LENGTH));
        }
        if ($type == 2) { // SigUp With Facebook
            if (!in_array("facebook_id", $keys) || empty($param['facebook_id']))
                return parameter_error_res("thirdparty_id_missing");
            // if (in_array("facebook_id", $keys) && $this->CI->model_user->facebookIdExist($param['facebook_id']))
            //     return parameter_error_res("thirdparty_id_exist");
        }
        if ($type == 3) { // SigUp With Google
            if (!in_array("google_id", $keys) || empty($param['google_id']))
                return parameter_error_res("thirdparty_id_missing");
            // if (in_array("google_id", $keys) && $this->CI->model_user->googleIdExist($param['google_id']))
            //     return parameter_error_res("thirdparty_id_exist");
        }
        if (in_array("first_name", $keys) && empty($param['first_name']))
            return parameter_error_res("first_name_missing");
        if (in_array("last_name", $keys) && empty($param['last_name']))
            return parameter_error_res("last_name_missing");
        if (in_array("invite_by", $keys) && !empty($param['invite_by']))
            $param['invite_by'] = $this->CI->model_user->inviteExist($param['invite_by']);

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function createProfile($param)
    {
        $uId = user_id();
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (in_array("email", $keys) && empty($param['email']))
            return parameter_error_res("email_missing");
        if (in_array("email", $keys) && !_email($param['email']))
            return parameter_error_res("invalid_email");
        if (in_array("email", $keys) && $this->CI->model_user->emailByUidExist($param['email'], $uId))
            return parameter_error_res("email_exist");
        if (in_array("mobile_number", $keys) && empty($param['mobile_number']))
            return parameter_error_res("mobile_number_missing");
        if (isset($_FILES['avatar']['error']) && $_FILES['avatar']['error'] != 0)
            return parameter_error_res("avatar_missing");
        if (isset($_FILES['avatar']['error']) && $_FILES['avatar']['error'] == 0) {
            $ext = strtolower(substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], ".") + 1));
            $allowed_uploads_extensions = $this->CI->config->item("allow_image_upload_extensions");
            if (!in_array($ext, $allowed_uploads_extensions))
                return parameter_error_res("invalid_image_extension");
        }
        if (in_array("invite_by", $keys) && !empty($param['invite_by']))
            $param['invite_by'] = $this->CI->model_user->inviteExist($param['invite_by']);

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function forgotPassword($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("email", $keys) || empty($param['email']))
            return parameter_error_res("email_missing");
        if (!_email($param['email']))
            return parameter_error_res("invalid_email");

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function resetPassword($param)
    {
        if (!isset($param['secret_token']) || empty($param['secret_token']))
            return parameter_error_res("invalid_page");
        if (!isset($param["new_password"]) || empty($param['new_password']))
            return parameter_error_res("password_missing");
        if (strlen($param['new_password']) < PASSWORD_MIN_LENGTH)
            return parameter_error_res("password_min_max_length_violate", array(PASSWORD_MIN_LENGTH));

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function resendActivationMail($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("email", $keys) || empty($param['email']))
            return parameter_error_res("email_missing");
        if (!_email($param['email']))
            return parameter_error_res("invalid_email");

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function logIn($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("type", $keys) || !in_array($param['type'], array(1, 2, 3)))
            return parameter_error_res("invalid_type_of_login_signup");
        $type = isset($param['type']) ? $param['type'] : 0;
        if ($type == 1) { // LogIn With Email & Password
            if (!in_array("email", $keys) || empty($param['email']))
                return parameter_error_res("email_missing");
            if (!in_array("password", $keys) || empty($param['password']))
                return parameter_error_res("password_missing");
            if (strlen($param['password']) < PASSWORD_MIN_LENGTH)
                return parameter_error_res("password_min_max_length_violate", array(PASSWORD_MIN_LENGTH));
        }
        if ($type == 2) { // LogIn With Facebook
            if (!in_array("facebook_id", $keys) || empty($param['facebook_id']))
                return parameter_error_res("thirdparty_id_missing");
        }
        if ($type == 3) { // LogIn With Google
            if (!in_array("google_id", $keys) || empty($param['google_id']))
                return parameter_error_res("thirdparty_id_missing");
        }
        $intervalSeconds = $this->CI->settings['unlock_login_interval'] * 60; // Minute to Seconds
        $unlockTime = time() - $intervalSeconds;
        $iWhere = "is_ignore = 0 AND on_date > {$unlockTime}";
        $iStatus = $this->CI->mylib->get_activity("login_try", ip(), "user", $this->CI->settings['no_of_login_attampt'], $iWhere);
        if (isset($iStatus['data'][0]) && $iStatus['statuscode'] == 1 && !empty($iStatus['data'][0])) {
            if ($this->CI->settings['no_of_login_attampt'] < count($iStatus['data']) + 1)
                return spamer_res("too_much_attempt", array($this->CI->settings['unlock_login_interval']));
        }

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function changeEmail($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("new_email", $keys) || empty($param['new_email']))
            return parameter_error_res("email_missing");
        if (!_email($param['new_email']))
            return parameter_error_res("invalid_email");
        if ($this->CI->model_user->emailExist($param['new_email']))
            return parameter_error_res("email_exist");
        if ($this->CI->model_user->emailChangeExist($param['new_email']))
            return parameter_error_res("email_exist");

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function changePassword($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("password", $keys) || empty($param['password']))
            return parameter_error_res("current_password_missing");
        if (strlen($param['password']) < PASSWORD_MIN_LENGTH)
            return parameter_error_res("current_password_min_max_length_violate", array(PASSWORD_MIN_LENGTH));
        if (!in_array("new_password", $keys) || empty($param['new_password']))
            return parameter_error_res("new_password_missing");
        if (strlen($param['new_password']) < PASSWORD_MIN_LENGTH)
            return parameter_error_res("new_password_min_max_length_violate", array(PASSWORD_MIN_LENGTH));
        if ($param["password"] == $param['new_password'])
            return parameter_error_res("same_password");

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function editProfile($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (in_array("email", $keys))
            unset($param['email']);
        if (in_array("type", $keys))
            unset($param['type']);
        if (in_array("first_name", $keys) && empty($param['first_name']))
            return parameter_error_res("first_name_missing");
        if (in_array("last_name", $keys) && empty($param['last_name']))
            return parameter_error_res("last_name_missing");
        if (in_array("mobile_number", $keys) && empty($param['mobile_number']))
            return parameter_error_res("mobile_number_missing");
        if (in_array("enable_push", $keys) && (!is_numeric($param['enable_push']) || !in_array($param['enable_push'], array(0, 1))))
            return parameter_error_res("invalid_enable_push");
        if (isset($_FILES['avatar']['error']) && $_FILES['avatar']['error'] == 0) {
            $ext = strtolower(substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], ".") + 1));
            $allowed_uploads_extensions = $this->CI->config->item("allow_image_upload_extensions");
            if (!in_array($ext, $allowed_uploads_extensions)) {
                return parameter_error_res("invalid_image_extension");
            }
        }
        if (in_array("invite_by", $keys) && !empty($param['invite_by']))
            $param['invite_by'] = $this->CI->model_user->inviteExist($param['invite_by']);

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function getOtherUserDetail($param)
    {
        $uId = $param['user_id'] = user_id();
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("ouid", $keys) || empty($param['ouid']) || !is_numeric($param['ouid']) || $uId === $param['ouid'])
            return parameter_error_res("invalid_ouid");
        if (!$this->CI->model_common->userExist($param['ouid']))
            return parameter_error_res("invalid_ouid");

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function lastSeenUpdate($param)
    {
        $uId = $param['user_id'] = user_id();
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (isset($param['ouid'])) {
            if (empty($param['ouid']) || !is_numeric($param['ouid']) || ($uId == $param['ouid']))
                return parameter_error_res("invalid_ouid");
        }

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function contactUs($param)
    {
        $uId = $param['user_id'] = user_id();
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (!in_array("name", $keys) || empty($param['name']))
            return parameter_error_res("name_missing");
        if (!in_array("email", $keys) || empty($param['email']) || !_email($param['email']))
            return parameter_error_res("email_missing");
        if (!in_array("subject", $keys) || empty($param['subject']))
            return parameter_error_res("subject_missing");
        if (!in_array("description", $keys) || empty($param['description']))
            return parameter_error_res("description_missing");

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function getSliders($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (in_array("search_key", $keys) && empty($param['search_key']))
            return parameter_error_res("search_key_missing");
        if (!in_array("start", $keys) || empty($param['start']))
            $param['start'] = 0;
        if (!in_array("len", $keys) || empty($param['len']))
            $param['len'] = 10;

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function getCategories($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (in_array("search_key", $keys) && empty($param['search_key']))
            return parameter_error_res("search_key_missing");
        if (!in_array("start", $keys) || empty($param['start']))
            $param['start'] = 0;
        if (!in_array("len", $keys) || empty($param['len']))
            $param['len'] = 10;

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function getImages($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (in_array("search_key", $keys) && empty($param['search_key']))
            return parameter_error_res("search_key_missing");
        if (!in_array("category_id", $keys) || empty($param['category_id']))
            return parameter_error_res("category_id_missing");
        if (!in_array("start", $keys) || empty($param['start']))
            $param['start'] = 0;
        if (!in_array("len", $keys) || empty($param['len']))
            $param['len'] = 10;

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }

    function getVideos($param)
    {
        $param = array_map('trim', $param);
        $keys = array_keys($param);
        if (in_array("search_key", $keys) && empty($param['search_key']))
            return parameter_error_res("search_key_missing");
        if (!in_array("category_id", $keys) || empty($param['category_id']))
            return parameter_error_res("category_id_missing");
        if (!in_array("start", $keys) || empty($param['start']))
            $param['start'] = 0;
        if (!in_array("len", $keys) || empty($param['len']))
            $param['len'] = 10;

        $iRes = success_res("validation_ok");
        $iRes['data'] = $param;
        return $iRes;
    }
}
