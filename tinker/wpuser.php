<?php

$userId = 1;
$user = Moox\Press\Models\WpUser::find($userId);
$prefix = 'tyar9_';

// The WordPress users table lacks some features, most packages working with users rely on, these are provided by the model, stored as WordPress-compatible usermeta

var_dump($user->id);
var_dump($user->name);
var_dump($user->email);
var_dump($user->password); // not bcrypt but phpass
var_dump($user->created_at); // set in boot-method
var_dump($user->updated_at); // set in boot-method
var_dump($user->remember_token);
var_dump($user->email_verified_at);

// While some of the meta fields are directly accessible and natively used in Filament like so

var_dump($user->first_name);
var_dump($user->last_name);
var_dump($user->nickname);
var_dump($user->description);
var_dump($user->session_tokens);
var_dump($user->moox_user_attachment_id);

// All other fields are accesible like so

var_dump($user->meta('capabilities'));
// if the meta key is prefixed also available as
var_dump($user->meta($prefix.'capabilities'));
// like these often needed prefixed keys
var_dump($user->meta($prefix.'user_level'));
var_dump($user->meta($prefix.'user-settings'));
var_dump($user->meta($prefix.'user-settings-time'));
var_dump($user->meta($prefix.'media_library_mode'));
var_dump($user->meta($prefix.'dashboard_quick_press_last_post_id'));
