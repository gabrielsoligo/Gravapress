<?php
    /*  
    *   Plugin Name: Gravapress
    *   Plugin URI: http://gabrielsoligo.com/gravapress
    *   Description: Opções para personlizar sua foto de perfil dentro do painel Wordpress
    *   Version: 0.1
    *   Author: Gabriel Soligo	
    *   Author URI: http://gabrielsoligo.com
    *   License: GPL2
    */

    /*
    *	Variaveis Globais
    */
    $plugins_url = WP_PLUGIN_URL . '/gravapress';
    $options = array();


    /*
    *	Links no menu Admin
    */
     function gravapress_menu(){        
        // https://codex.wordpress.org/Function_Reference/add_options_page
        // add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
        
        add_options_page(
            'Gravatar WordPress Profile Integration',
            'Gravapress',
            'manage_options',
            'gravapress',
            'gravapress_options_page'
        );
    }
    add_action( 'admin_menu', 'gravapress_menu' );   

    /*
    *   Página de configuração
    */
    function gravapress_options_page(){
        // Test to see if the user can manage the plugin
        if ( !current_user_can( 'manage_options' ) ) {
            wp_die( 'Acesso negado para essa página.' );
        }

        global $plugins_url;
        global $options;

        //Gravapress formulario de login
        if(isset($_POST['email_submitted'])){

        	$campo_hidden = esc_html( $_POST['email_submitted'] );

        	if ( $campo_hidden == 'Y') {

        		//usuario
        		$gravapress_email = esc_html( $_POST['gravatar_email'] );

        		//Inserindo dados na tabela options
        		$options['user_email'] = $gravapress_email;
        		$options['last_updated'] = time();

        		update_option( 'gravapress', $options );

        		echo "Deu bom";

        	}
        }

        $options = get_option( 'gravapress' );

        if ($options != '') {
        	
        	$gravapress_email = $options['user_email'];
        }

		require('includes/options-page.php');
	}
    /*
    *   chamando css
    */
    function gravapress_styles(){

    	wp_enqueue_style( 'gravapress_styles', plugins_url( 'gravapress/gravapress.css' ) );

    }
    add_action( 'admin_head', 'gravapress_styles' );

?>