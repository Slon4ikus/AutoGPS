<?php
class core_view
{
    public static function generate($template, $content, $data = null)
    {
        include 'view' . DIRECTORY_SEPARATOR . $template;
    }
}
