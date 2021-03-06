<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
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
        'title'          => 'Roles',
        'title_singular' => 'Role',
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
        'title'          => 'Users',
        'title_singular' => 'User',
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
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'membership' => [
        'title'          => 'Membership',
        'title_singular' => 'Membership',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'user'                   => 'User',
            'user_helper'            => ' ',
            'org'                    => 'Membership Id',
            'org_helper'             => 'Add your membership number/id',
            'expiration_date'        => 'Expiration Date',
            'expiration_date_helper' => 'Enter your membership expiration date',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'membershiptype'         => 'Membership Type',
            'membershiptype_helper'  => 'Select your membership type',
        ],
    ],
    'membershiptype' => [
        'title'          => 'Membershiptype',
        'title_singular' => 'Membershiptype',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'descr'             => 'Description',
            'descr_helper'      => 'Select your membership type',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'event' => [
        'title'          => 'Event',
        'title_singular' => 'Event',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => 'Enter the event name',
            'short_name'            => 'Short Name',
            'short_name_helper'     => 'Enter the event short name (max: 40 characters)',
            'start_datetime'        => 'Start Date and Time',
            'start_datetime_helper' => 'Select the event\'s start date and time',
            'end_datetime'          => 'End Date and Time',
            'end_datetime_helper'   => 'Select the event\'s end date and time',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'location' => [
        'title'          => 'Location',
        'title_singular' => 'Location',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'event'              => 'Event',
            'event_helper'       => 'Select the event\'s location(s)',
            'name'               => 'Name',
            'name_helper'        => 'Enter the location name',
            'address_1'          => 'Address 1',
            'address_1_helper'   => 'Enter the location address',
            'address_2'          => 'Address 2',
            'address_2_helper'   => 'Enter the location\'s additional address information',
            'city'               => 'City',
            'city_helper'        => 'Enter the location\'s city',
            'state_abbr'         => 'State Abbreviation',
            'state_abbr_helper'  => 'Enter the state\'s two-character abbreviation',
            'postal_code'        => 'Zip Code',
            'postal_code_helper' => 'Enter the location\'s zip code',
            'map_link'           => 'Map Link',
            'map_link_helper'    => 'Enter the link to the location\'s map address',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'locationdate' => [
        'title'          => 'Location Dates',
        'title_singular' => 'Location Date',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'location'              => 'Location',
            'location_helper'       => 'Select the date\'s location',
            'event'                 => 'Event',
            'event_helper'          => 'Select the event for this location date',
            'start_datetime'        => 'Start Date and Time',
            'start_datetime_helper' => 'Select the location\'s start date and time',
            'end_datetime'          => 'End Date and Time',
            'end_datetime_helper'   => 'Select the location\'s end date and time',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'participant' => [
        'title'          => 'Participant',
        'title_singular' => 'Participant',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'user'                => 'User',
            'user_helper'         => 'Select User',
            'event'               => 'Event',
            'event_helper'        => 'Select the event',
            'locationdate'        => 'Location Date',
            'locationdate_helper' => 'Select the event\'s location date',
            'photo'               => 'Photo',
            'photo_helper'        => 'Optionally update a photo of yourself',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'optiontype' => [
        'title'          => 'Option Type',
        'title_singular' => 'Option Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'descr'             => 'Description',
            'descr_helper'      => 'Enter an option type description',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'option' => [
        'title'          => 'Option',
        'title_singular' => 'Option',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'optiontype'             => 'Option Type',
            'optiontype_helper'      => 'Select an option type',
            'descr'                  => 'Description',
            'descr_helper'           => 'Enter an option description',
            'label_default'          => 'Label Default',
            'label_default_helper'   => 'Enter a default label',
            'label_alternate'        => 'Label Alternate',
            'label_alternate_helper' => 'Enter an optional label alternate',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'organization' => [
        'title'          => 'Organizations',
        'title_singular' => 'Organization',
    ],
    'eventversion' => [
        'title'          => 'Event Management',
        'title_singular' => 'Event Management',
    ],
    'schoolManagement' => [
        'title'          => 'School Management',
        'title_singular' => 'School Management',
    ],
    'school' => [
        'title'          => 'School',
        'title_singular' => 'School',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'user'               => 'User',
            'user_helper'        => 'Select user',
            'name'               => 'School Name',
            'name_helper'        => 'Enter the school\'s name as it should appear in the program.',
            'address_1'          => 'Address 1',
            'address_1_helper'   => 'Enter the school\'s address',
            'address_2'          => 'Address 2',
            'address_2_helper'   => 'Enter the school\'s extended address',
            'city'               => 'City',
            'city_helper'        => 'Enter the school\'s city',
            'state_abbr'         => 'State Abbreviation',
            'state_abbr_helper'  => 'Enter the school\'s two-character state abbreviation',
            'postal_code'        => 'Zip Code',
            'postal_code_helper' => 'Enter the school\'s zip code',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'ensembleManagement' => [
        'title'          => 'Ensemble Management',
        'title_singular' => 'Ensemble Management',
    ],
    'ensembletype' => [
        'title'          => 'Ensemble Type',
        'title_singular' => 'Ensemble Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'descr'             => 'Description',
            'descr_helper'      => 'Enter ensemble type description',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'ensemble' => [
        'title'          => 'Ensemble',
        'title_singular' => 'Ensemble',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'user'                => 'User',
            'user_helper'         => 'Select user to which this ensemble belongs',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'school'              => 'School',
            'school_helper'       => 'Select school to which this ensemble belongs',
            'event'               => 'Event',
            'event_helper'        => 'Select the event to which the ensemble belongs',
            'name'                => 'Name',
            'name_helper'         => 'Enter the ensemble\'s name',
            'conductor'           => 'Conductor',
            'conductor_helper'    => 'Enter the name of the ensemble\'s conductor',
            'ensembletype'        => 'Ensemble Type',
            'ensembletype_helper' => 'Select the ensemble type',
            'auditioned'          => 'This is an auditioned ensemble.',
            'auditioned_helper'   => 'Check to designate this as an auditioned ensemble.',
        ],
    ],
    'repertoire' => [
        'title'          => 'Repertoire',
        'title_singular' => 'Repertoire',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'event'                => 'Event',
            'event_helper'         => 'Select the event in which this repertoire will be performed',
            'ensemble'             => 'Ensemble',
            'ensemble_helper'      => 'Select the ensemble for this repertoire.',
            'title'                => 'Title',
            'title_helper'         => 'Enter the repertoire title',
            'subtitle'             => 'Subtitle',
            'subtitle_helper'      => 'Enter the repertoire subtitle',
            'duration'             => 'Duration',
            'duration_helper'      => 'Enter the repertoire duration',
            'movements'            => 'Movements',
            'movements_helper'     => 'Enter the movements to be performed.',
            'composer'             => 'Composer',
            'composer_helper'      => 'Enter the repertoire Composer.',
            'arranger'             => 'Arranger',
            'arranger_helper'      => 'Enter the repertoire Arranger.',
            'lyricist'             => 'Lyricist',
            'lyricist_helper'      => 'Enter the repertoire Lyricist.',
            'choreographer'        => 'Choreographer',
            'choreographer_helper' => 'Enter the repertoire Choreographer.',
            'comments'             => 'Comments',
            'comments_helper'      => 'Enter any additional comments...',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'phonetype' => [
        'title'          => 'Phone Type',
        'title_singular' => 'Phone Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'descr'             => 'Description',
            'descr_helper'      => 'Select a phone type',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'phone' => [
        'title'          => 'Phone',
        'title_singular' => 'Phone',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => 'Select the user to which the phone belongs',
            'phonetype'         => 'Phone Type',
            'phonetype_helper'  => 'Select the type of phone',
            'phone'             => 'Phone',
            'phone_helper'      => 'Enter the phone number (#-#',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'inventoryManagement' => [
        'title'          => 'Inventory Management',
        'title_singular' => 'Inventory Management',
    ],
    'inventorytype' => [
        'title'          => 'Inventory Type',
        'title_singular' => 'Inventory Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'descr'             => 'Description',
            'descr_helper'      => 'Enter the inventory type description',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'inventory' => [
        'title'          => 'Inventory',
        'title_singular' => 'Inventory',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'inventorytype'        => 'Inventory Type',
            'inventorytype_helper' => 'Select the inventory type',
            'name'                 => 'Name',
            'name_helper'          => 'Enter the name of the inventory item.',
            'price'                => 'Price',
            'price_helper'         => 'Enter the per-item price of the inventory item',
            'order_by'             => 'Order By',
            'order_by_helper'      => 'Enter the number by which this item should be ordered.',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'cart' => [
        'title'          => 'Cart',
        'title_singular' => 'Cart',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'event'             => 'Event',
            'event_helper'      => 'Select the event to which this cart belongs',
            'user'              => 'User',
            'user_helper'       => 'Select the user to which this cart belongs.',
            'inventory'         => 'Inventory',
            'inventory_helper'  => 'Select the inventory item which belongs in the cart',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paymentManagement' => [
        'title'          => 'Payment Management',
        'title_singular' => 'Payment Management',
    ],
    'paymenttype' => [
        'title'          => 'Payment Type',
        'title_singular' => 'Payment Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'descr'             => 'Description',
            'descr_helper'      => 'Enter the payment type description.',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'Payment',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'event'                 => 'Event',
            'event_helper'          => 'Select the event to which the payment belongs.',
            'user'                  => 'User',
            'user_helper'           => 'Select the user to which this payment belongs.',
            'paymenttype'           => 'Payment Type',
            'paymenttype_helper'    => 'Select the payment type for this payment.',
            'amount'                => 'Amount',
            'amount_helper'         => 'Enter the amount of the payment',
            'payment_date'          => 'Payment Date',
            'payment_date_helper'   => 'Select the date of the payment.',
            'payment_number'        => 'Check Number',
            'payment_number_helper' => 'Enter any identifying payment number',
            'comments'              => 'Comments',
            'comments_helper'       => 'Enter any clarifying comments...',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
];
