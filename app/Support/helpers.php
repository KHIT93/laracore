<?php
if (!function_exists('t')) {
    function t($string, $args = array())
    {
        return \App\Libraries\UI::translate($string, $args);
    }
}

if (!function_exists('string_format')) {
    function string_format($string, $args = array())
    {
        return \App\Libraries\UI::FormatString($string, $args);
    }
}

if (!function_exists('has_permission')) {
    function has_permission($permission)
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('administrator')) {
                return true;
            } else if (auth()->user()->can($permission)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

if (!function_exists('eval_permission')) {
    function eval_permission($permission, $admin = true)
    {
        if (auth()->check()) {
            if ($admin) {
                if (!has_permission('access_admin_ui') && !has_permission($permission)) {
                    abort(403, 'You do not have access to the specified resource.');
                }
            } else {
                if (!has_permission($permission)) {
                    abort(403, 'You do not have access ro the specified resource.');
                }
            }
        } else {
            return redirect('auth/login');
        }
    }
}