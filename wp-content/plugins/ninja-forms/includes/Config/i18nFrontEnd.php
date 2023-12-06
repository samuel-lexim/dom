<?php if ( ! defined( 'ABSPATH' ) ) exit;
global $wp_locale;

$date_format = Ninja_Forms()->get_setting( 'date_format' );
if( ! $date_format ) $date_format = get_option( 'date_format' );

return apply_filters( 'ninja_forms_i18n_front_end', array(

    'ninjaForms'                            => esc_html__( 'Ninja Forms', 'ninja-forms' ),
    'changeEmailErrorMsg'                   => esc_html__( 'Please enter a valid email address!', 'ninja-forms' ),
    'changeDateErrorMsg'                    => esc_html__( 'Please enter a valid date!', 'ninja-forms' ),
    'confirmFieldErrorMsg'                  => esc_html__( 'These fields must match!', 'ninja-forms' ),
    'fieldNumberNumMinError'                => esc_html__( 'Number Min Error', 'ninja-forms' ),
    'fieldNumberNumMaxError'                => esc_html__( 'Number Max Error', 'ninja-forms' ),
    'fieldNumberIncrementBy'                => esc_html__( 'Please increment by ', 'ninja-forms' ),
    'fieldTextareaRTEInsertLink'            => esc_html__( 'Insert Link', 'ninja-forms' ),
    'fieldTextareaRTEInsertMedia'           => esc_html__( 'Insert Media', 'ninja-forms' ),
    'fieldTextareaRTESelectAFile'           => esc_html__( 'Select a file', 'ninja-forms' ),
    'formErrorsCorrectErrors'               => esc_html__( 'Please correct errors before submitting this form.', 'ninja-forms' ),
    'formHoneypot'                          => esc_html__( 'If you are a human seeing this field, please leave it empty.', 'ninja-forms' ),
    'validateRequiredField'                 => esc_html__( 'This is a required field.', 'ninja-forms' ),
    'honeypotHoneypotError'                 => esc_html__( 'Honeypot Error', 'ninja-forms' ),
    'fileUploadOldCodeFileUploadInProgress' => esc_html__( 'File Upload in Progress.', 'ninja-forms' ),
    'fileUploadOldCodeFileUpload'           => esc_html__( 'FILE UPLOAD', 'ninja-forms' ),
    'currencySymbol'                        => Ninja_Forms()->get_setting( 'currency_symbol' ),
    'fieldsMarkedRequired'                  => sprintf( esc_html__( 'Fields marked with an %s*%s are required', 'ninja-forms' ), '<span class="ninja-forms-req-symbol">', '</span>' ),
    'thousands_sep'                         => $wp_locale->number_format[ 'thousands_sep' ],
    'decimal_point'                         => $wp_locale->number_format[ 'decimal_point' ],
    'siteLocale'                            => get_locale(),
    'dateFormat'                            => $date_format,
    'startOfWeek'                           => get_option( 'start_of_week' ),
    'of'                                    => esc_html__( 'of', 'ninja-forms' ),
    'previousMonth'                         => esc_html__( 'Previous Month', 'ninja-forms' ),
    'nextMonth'                             => esc_html__( 'Next Month', 'ninja-forms' ),
    'months'                                => array(
                                                esc_html__( 'January', 'ninja-forms' ),
                                                esc_html__( 'February', 'ninja-forms' ),
                                                esc_html__( 'March', 'ninja-forms' ),
                                                esc_html__( 'April', 'ninja-forms' ),
                                                esc_html__( 'May', 'ninja-forms' ),
                                                esc_html__( 'June', 'ninja-forms' ),
                                                esc_html__( 'July', 'ninja-forms' ),
                                                esc_html__( 'August', 'ninja-forms' ),
                                                esc_html__( 'September', 'ninja-forms' ),
                                                esc_html__( 'October', 'ninja-forms' ),
                                                esc_html__( 'November', 'ninja-forms' ),
                                                esc_html__( 'December', 'ninja-forms' )
                                            ),
    'monthsShort'                           => array(
                                                esc_html__( 'Jan', 'ninja-forms' ),
                                                esc_html__( 'Feb', 'ninja-forms' ),
                                                esc_html__( 'Mar', 'ninja-forms' ),
                                                esc_html__( 'Apr', 'ninja-forms' ),
                                                esc_html__( 'May', 'ninja-forms' ),
                                                esc_html__( 'Jun', 'ninja-forms' ),
                                                esc_html__( 'Jul', 'ninja-forms' ),
                                                esc_html__( 'Aug', 'ninja-forms' ),
                                                esc_html__( 'Sep', 'ninja-forms' ),
                                                esc_html__( 'Oct', 'ninja-forms' ),
                                                esc_html__( 'Nov', 'ninja-forms' ),
                                                esc_html__( 'Dec', 'ninja-forms' ),
                                            ),
    'weekdays'                              => array(
                                                esc_html__( 'Sunday', 'ninja-forms' ),
                                                esc_html__( 'Monday', 'ninja-forms' ),
                                                esc_html__( 'Tuesday', 'ninja-forms' ),
                                                esc_html__( 'Wednesday', 'ninja-forms' ),
                                                esc_html__( 'Thursday', 'ninja-forms' ),
                                                esc_html__( 'Friday', 'ninja-forms' ),
                                                esc_html__( 'Saturday', 'ninja-forms' ),
                                            ),
    'weekdaysShort'                         => array(
                                                esc_html__( 'Sun', 'ninja-forms' ),
                                                esc_html__( 'Mon', 'ninja-forms' ),
                                                esc_html__( 'Tue', 'ninja-forms' ),
                                                esc_html__( 'Wed', 'ninja-forms' ),
                                                esc_html__( 'Thu', 'ninja-forms' ),
                                                esc_html__( 'Fri', 'ninja-forms' ),
                                                esc_html__( 'Sat', 'ninja-forms' ),
                                            ),
    'weekdaysMin'                           => array(
                                                esc_html__( 'Su', 'ninja-forms' ),
                                                esc_html__( 'Mo', 'ninja-forms' ),
                                                esc_html__( 'Tu', 'ninja-forms' ),
                                                esc_html__( 'We', 'ninja-forms' ),
                                                esc_html__( 'Th', 'ninja-forms' ),
                                                esc_html__( 'Fr', 'ninja-forms' ),
                                                esc_html__( 'Sa', 'ninja-forms' )
                                            ),
    'recaptchaConsentMissing'               =>  esc_html__( "reCaptcha validation couldn't load.", 'ninja-forms' ),
    'recaptchaMissingCookie'                =>  esc_html__( "reCaptcha v3 validation couldn't load the cookie needed to submit the form.", 'ninja-forms' ),
    'recaptchaConsentEvent'                 =>  esc_html__( 'Accept reCaptcha cookies before sending the form.', 'ninja-forms' ),
));
