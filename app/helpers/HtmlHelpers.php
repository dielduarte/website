<?php

HTML::macro('gravatar', function($email, $size = 32, $default = 'mm'){
    return '<img src="http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?s=' . $size . '&d=' . $default . '" alt="Avatar">';
});

HTML::macro('listErrors', function($errors){
    return '<div class="alert alert-danger"><b>Os seguintes erros foram encontrados:</b>' . implode('', $errors->all('<p>:message</p>')) . '</div>';
});

HTML::macro('table', function($fields = array(), $data = array(), $resource, $showEdit = true, $showDelete = true, $showView = true){
    $table = '<table class="table table-bordered">';
    $table .='<tr>';
    if ($showEdit || $showDelete || $showView )
        $table .= '<th></th>';

    foreach ($fields as $field)
    {
        $table .= '<th>' . Str::title($field) . '</th>';
    }
    $table .= '</tr>';
    foreach ( $data as $d )
    {
        $table .= '<tr>';

        if ($showEdit || $showDelete || $showView )
        {
            $table .= '<td>';
            if ($showEdit)
                $table .= '<a href="' . $resource . '/' . $d->id . '/edit" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> ';
            if ($showView)
                $table .= '<a href="' . $resource . '/' . $d->id . '" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-eye-open"></i> View</a> ';
            if ($showDelete)
                $table .= '<a href="' . $resource . '/' . $d->id . '/delete" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a> ';
            $table .= '</td>';
        }
        
        foreach($fields as $key) {
            $table .= '<td>' . $d->$key . '</td>';
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    
    return $table;
});