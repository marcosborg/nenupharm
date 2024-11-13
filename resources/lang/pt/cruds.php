<?php

return [
    'userManagement' => [
        'title'          => 'Gestão de utilizadores',
        'title_singular' => 'Gestão de utilizadores',
    ],
    'permission' => [
        'title'          => 'Permissões',
        'title_singular' => 'Permissão',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Grupos',
        'title_singular' => 'Função',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilizadores',
        'title_singular' => 'Utilizador',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'navigation' => [
        'title'          => 'Navigation',
        'title_singular' => 'Navigation',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'label'             => 'Label',
            'label_helper'      => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'position'          => 'Position',
            'position_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'language'          => 'Language',
            'language_helper'   => ' ',
        ],
    ],
    'banner' => [
        'title'          => 'Banner',
        'title_singular' => 'Banner',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'header'            => 'Header',
            'header_helper'     => ' ',
            'sub_header'        => 'Sub Header',
            'sub_header_helper' => ' ',
            'button'            => 'Button',
            'button_helper'     => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => '2440 x 1578',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'language'          => 'Language',
            'language_helper'   => ' ',
        ],
    ],
    'feature' => [
        'title'          => 'Feature',
        'title_singular' => 'Feature',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'icon'              => 'Icon',
            'icon_helper'       => 'https://fontawesome.com/v4/icons/',
            'button'            => 'Button',
            'button_helper'     => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'language'          => 'Language',
            'language_helper'   => ' ',
        ],
    ],
    'quote' => [
        'title'          => 'Quote',
        'title_singular' => 'Quote',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'job'               => 'Job',
            'job_helper'        => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => '1023 x 1103',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'language'          => 'Language',
            'language_helper'   => ' ',
        ],
    ],
    'about' => [
        'title'          => 'About',
        'title_singular' => 'About',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'subtitle'          => 'Subtitle',
            'subtitle_helper'   => ' ',
            'photo_1'           => 'Photo 1',
            'photo_1_helper'    => '800 x 600',
            'photo_2'           => 'Photo 2',
            'photo_2_helper'    => '600 x 700',
            'icon'              => 'Icon',
            'icon_helper'       => 'https://fontawesome.com/v4/icons/',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'language'          => 'Language',
            'language_helper'   => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
        ],
    ],
    'doctor' => [
        'title'          => 'Staff',
        'title_singular' => 'Staff',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'job'               => 'Job',
            'job_helper'        => ' ',
            'contacts'          => 'Contacts',
            'contacts_helper'   => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => '800 x 700',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'language'          => 'Language',
            'language_helper'   => ' ',
        ],
    ],
    'contact' => [
        'title'          => 'Contact',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'icon'              => 'Icon',
            'icon_helper'       => 'https://fontawesome.com/v4/icons/',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'language'          => 'Language',
            'language_helper'   => ' ',
        ],
    ],

];