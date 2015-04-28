<?php
if(!function_exists('t'))
{
    function t($string, $args = array())
    {
        $output = '';
        $lang = config('app.locale');
        if($lang == 'en')
        {
            $output = $string;
        }
        else
        {
            $translation = '';
            try
            {
                $translation = DB::table('translations')->where('string', '=', $string)->where('locale', '=', $lang)->get()[0]->translation;
            }
            catch (Exception $ex){}
            
            if(is_null($translation) || $translation == '')
            {
                $output = $string;
                try
                {
                    DB::table('translations')->insert(['string' => $string, 'translation' => '', 'locale' => $lang, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]);
                }
                catch (Exception $ex) {}
            }
            else
            {
                $output = $translation;
            }
        }
        return string_format($output, $args);
    }
}

if(!function_exists('string_format')) {
    function string_format($string, $args = array()) {
        // Transform arguments before inserting them.
        foreach ($args as $key => $value) {
            switch ($key[0]) {
                case '@':
                    // Escaped only.
                    $args[$key] = check_plain($value);
                    //$args[$key] = $value;
                break;

                case '%':
                default:
                // Escaped and placeholder.
                    //$args[$key] = Sanitize::stringPlaceholder($value);
                    $args[$key] = $value;
                break;

                case '!':
                    // Pass-through.
            }
        }
        return strtr($string, $args);
    }
}

if(!function_exists('has_permission'))
{
    function has_permission($permission)
    {
        if(auth()->check())
        {
            if(auth()->user()->hasRole('administrator'))
            {
                return true;
            }
            else if(auth()->user()->can($permission))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('eval_permission'))
{
    function eval_permission($permission, $admin = true)
    {
        if(auth()->check())
        {
            if($admin)
            {
                if(!has_permission('access_admin_ui') && !has_permission($permission))
                {
                    abort(403, 'You do not have access to the specified resource.');
                }
            }
            else
            {
                if(!has_permission($permission))
                {
                    abort(403, 'You do not have access ro the specified resource.');
                }
            }
        }
        else
        {
            redirect('auth/login');
        }
    }
}