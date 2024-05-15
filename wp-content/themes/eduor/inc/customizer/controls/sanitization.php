<?php

if ( class_exists( 'WP_Customize_Control' ) ) {

	/* = Header 1 
    ==========================================================*/
    if ( ! function_exists( 'softcoderstheme_is_header1_enabled' ) ) {
        function softcoderstheme_is_header1_enabled() {
            $header_style = get_theme_mod( 'header_style' );
            if ( $header_style == 1 ) {
                return true;
            }
            return false;
        }
    }

	/* = Header 1 Button
    ==========================================================*/
    if ( ! function_exists( 'softcoderstheme_header_btn_enabled' ) ) {
        function softcoderstheme_header_btn_enabled() {
        	$header_style = get_theme_mod( 'header_style' );
            if ( $header_style == 1 ) {
                return true;
            }
            return false;
        }
    }

    /* = Header 2,3,4 
    ==========================================================*/
    if ( ! function_exists( 'softcoderstheme_is_header2_enabled' ) ) {
        function softcoderstheme_is_header2_enabled() {
            $header_style = get_theme_mod( 'header_style' );
            if ( $header_style != 1 ) {
                return true;
            }
            return false;
        }
    }

	/* = Header 2,3,4 Button
    ==========================================================*/
    if ( ! function_exists( 'softcoderstheme_header2_btn_enabled' ) ) {
        function softcoderstheme_header2_btn_enabled() {
        	$header_style = get_theme_mod( 'header_style' );
            if ( $header_style != 1 ) {
                return true;
            }
            return false;
        }
    }

	/* = Page Layout
    ==========================================================*/
	/**
     * Check is Enabled Header Button
     */
    if ( ! function_exists( 'softcoderstheme_is_header_banner_enabled' ) ) {
        function softcoderstheme_is_header_banner_enabled() {
            $page_banner = get_theme_mod('page_banner');
            if (empty($page_banner)) {
                return false;
            }
            return true;
        }
    }

	/**
     * Check is selected banner background type is image
     */
    if ( ! function_exists( 'softcoderstheme_banner_bgimg_type_condition' ) ) {
        function softcoderstheme_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('page_banner_bg_type');
            if ( $BgType === 'bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /**
     * Check is selected banner background type is color
     */
    if ( ! function_exists( 'softcoderstheme_banner_bgcolor_type_condition' ) ) {
        function softcoderstheme_banner_bgcolor_type_condition() {
            $checkbox_value = get_theme_mod( 'page_banner', false );
            $select_value   = get_theme_mod( 'page_banner_bg_type', 'bgcolor' );
            if ( !empty( $checkbox_value ) && $select_value == 'bgcolor' ) {
                return true;
            }
            return false;
        }
    }

    /* = Single Page Layout
    ==========================================================*/
    /**
     * Check is Enabled Header Button
     */
    if ( ! function_exists( 'softcoderstheme_is_single_post_banner_enabled' ) ) {
        function softcoderstheme_is_single_post_banner_enabled() {
            $page_banner = get_theme_mod('single_post_banner');
            if (empty($page_banner)) {
                return false;
            }
            return true;
        }
    }

	/**
     * Check is selected banner background type is image
     */
    if ( ! function_exists( 'softcoderstheme_single_banner_bgimg_type_condition' ) ) {
        function softcoderstheme_single_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('single_post_banner_bg_type');
            if ( $BgType === 'bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /**
     * Check is selected banner background type is color
     */
    if ( ! function_exists( 'softcoderstheme_single_banner_bgcolor_type_condition' ) ) {
        function softcoderstheme_single_banner_bgcolor_type_condition() {
            $select_value = get_theme_mod( 'single_post_banner', false );
            $select_bg_value = get_theme_mod( 'single_post_banner_bg_type', 'bgcolor' );
            if ( !empty( $select_value ) && $select_bg_value == 'bgcolor' ) {
                return true;
            }
            return false;
        }
    }

    /* = Blog Columns
    ==========================================================*/
    /**
     * Footer 1 Condition
     */
    if ( ! function_exists( 'softcoderstheme_blog_cols_condition' ) ) {
        function softcoderstheme_blog_cols_condition() {
             $blog_style = get_theme_mod( 'blog_layout');
            if ( $blog_style != 1 ) {
                return true;
            } else {
                return false;
            }
        }
    }


    /* = Footer Enable
    ==========================================================*/
    if ( ! function_exists( 'softcoderstheme_is_footer1_enabled' ) ) {
        function softcoderstheme_is_footer1_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '1' );
            if ( $footer_style == 1 || $footer_style == 1 ) {
                return true;
            } elseif ( $footer_style2 == 2 ) {
            	return true;
            }
            return false;
        }
    }


    /**
     * Footer 1 Condition
     */
    if ( ! function_exists( 'softcoderstheme_footer1_bg_condition' ) ) {
        function softcoderstheme_footer1_bg_condition() {
             $footer_style = get_theme_mod( 'footer_style');
            if ( $footer_style == 1 ) {
                return true;
            } else {
            	return false;
            }
        }
    }


    /**
     * Footer 2 Condition
     */
    if ( ! function_exists( 'softcoderstheme_footer2_bg_condition' ) ) {
        function softcoderstheme_footer2_bg_condition() {
             $footer_style = get_theme_mod( 'footer_style');
            if ( $footer_style == 2 ) {
                return true;
            } else {
            	return false;
            }
        }
    }
    /**
     * Footer 3 Condition
     */
    if ( ! function_exists( 'softcoderstheme_footer3_bg_condition' ) ) {
        function softcoderstheme_footer3_bg_condition() {
             $footer_style = get_theme_mod( 'footer_style');
            if ( $footer_style == 3 ) {
                return true;
            } else {
            	return false;
            }
        }
    }


    /* = Porttolio Grid Enable
    ==========================================================*/
    if ( ! function_exists( 'softcoderstheme_portfolio_grid_enabled' ) ) {
        function softcoderstheme_portfolio_grid_enabled() {
            $portfolio = get_theme_mod( 'portfolio_style' );
            if ( $portfolio == 1 || $portfolio == 3 ) {
                return true;
            } else {
            	return false;
            }
            return false;
        }
    }


    /* = Porttolio filter enable
    ==========================================================*/
    if ( ! function_exists( 'softcoderstheme_portfolio_filter_enabled' ) ) {
        function softcoderstheme_portfolio_filter_enabled() {
            $portfolio_filter = get_theme_mod( 'portfolio_filter' );
            if ( $portfolio_filter == 1 ) {
                return true;
            } else {
                return false;
            }
        }
    }


	/**
	 * URL sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single url or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'softcoderstheme_url_sanitization' ) ) {
		function softcoderstheme_url_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if ( is_array( $input ) ) {
				foreach ($input as $key => $value) {
					$input[$key] = esc_url_raw( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = esc_url_raw( $input );
			}
			return $input;
		}
	}

	/**
	 * Switch sanitization
	 *
	 * @param  string		Switch value
	 * @return integer	Sanitized value
	 */

	if ( ! function_exists( 'softcoderstheme_switch_sanitization' ) ) {
		function softcoderstheme_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	/**
	 * Radio Button and Select sanitization
	 *
	 * @param  string		Radio Button value
	 * @return integer	Sanitized value
	 */
	if ( ! function_exists( 'softcoderstheme_radio_sanitization' ) ) {
		function softcoderstheme_radio_sanitization( $input, $setting ) {
			//get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}
	}

	/**
	 * Integer sanitization
	 *
	 * @param  string		Input value to check
	 * @return integer	Returned integer value
	 */

	if ( ! function_exists( 'softcoderstheme_sanitize_integer' ) ) {
		function softcoderstheme_sanitize_integer( $input ) {
			return (int) $input;
		}
	}

	/**
	 * Text sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single string or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'softcoderstheme_text_sanitization' ) ) {
		function softcoderstheme_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}
	}

    /**
     * Google Font sanitization
     *
     * @param  string	JSON string to be sanitized
     * @return string	Sanitized input
     */

    if ( ! function_exists( 'softcoderstheme_google_font_sanitization' ) ) {
        function softcoderstheme_google_font_sanitization( $input ) {
            $val =  json_decode( $input, true );
            if( is_array( $val ) ) {
                foreach ( $val as $key => $value ) {
                    $val[$key] = sanitize_text_field( $value );
                }
                $input = json_encode( $val );
            }
            else {
                $input = json_encode( sanitize_text_field( $val ) );
            }
            return $input;
        }
    }

	/**
	 * Array sanitization
	 *
	 * @param  array	Input to be sanitized
	 * @return array	Sanitized input
	 */
	if ( ! function_exists( 'softcoderstheme_array_sanitization' ) ) {
		function softcoderstheme_array_sanitization( $input ) {
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
			}
			else {
				$input = '';
			}
			return $input;
		}
	}

	/**
	 * Alpha Color (Hex & RGBa) sanitization
	 *
	 * @param  string	Input to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'softcoderstheme_hex_rgba_sanitization' ) ) {
		function softcoderstheme_hex_rgba_sanitization( $input, $setting ) {
			if ( empty( $input ) || is_array( $input ) ) {
				return $setting->default;
			}

			if ( false === strpos( $input, 'rgba' ) ) {
				// If string doesn't start with 'rgba' then santize as hex color
				$input = sanitize_hex_color( $input );
			} else {
				// Sanitize as RGBa color
				$input = str_replace( ' ', '', $input );
				sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
				$input = 'rgba(' . softcoderstheme_in_range( $red, 0, 255 ) . ',' . softcoderstheme_in_range( $green, 0, 255 ) . ',' . softcoderstheme_in_range( $blue, 0, 255 ) . ',' . softcoderstheme_in_range( $alpha, 0, 1 ) . ')';
			}
			return $input;
		}
	}

	/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param  number	Input to be sanitized
	 * @return number	Sanitized input
	 */
	if ( ! function_exists( 'softcoderstheme_in_range' ) ) {
		function softcoderstheme_in_range( $input, $min, $max ){
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
		    return $input;
		}
	}

	/**
	 * Date Time sanitization
	 *
	 * @param  string	Date/Time string to be sanitized
	 * @return string	Sanitized input
	 */

	if ( ! function_exists( 'softcoderstheme_date_time_sanitization' ) ) {
		function softcoderstheme_date_time_sanitization( $input, $setting ) {
			$datetimeformat = 'Y-m-d';
			if ( $setting->manager->get_control( $setting->id )->include_time ) {
				$datetimeformat = 'Y-m-d H:i:s';
			}
			$date = DateTime::createFromFormat( $datetimeformat, $input );
			if ( $date === false ) {
				$date = DateTime::createFromFormat( $datetimeformat, $setting->default );
			}
			return $date->format( $datetimeformat );
		}
	}

	/**
	 * Slider sanitization
	 *
	 * @param  string	Slider value to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'softcoderstheme_range_sanitization' ) ) {
		function softcoderstheme_range_sanitization( $input, $setting ) {
			$attrs = $setting->manager->get_control( $setting->id )->input_attrs;

			$min = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
			$max = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
			$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

			$number = floor( $input / $attrs['step'] ) * $attrs['step'];

			return softcoderstheme_in_range( $number, $min, $max );
		}
	}

}
