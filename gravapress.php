<?php
    /*  
    *   Plugin Name: Gravapress
    *   Plugin URI: http://gabrielsoligo.com/gravapress
    *   Description: Opções para personlizar sua foto de perfil dentro do painel Wordpress com Gravatar
    *   Version: 0.2
    *   Author: Gabriel Soligo	
    *   Author URI: http://gabrielsoligo.com
    *   License: GPL2
    */

    /*
    *	Variaveis Globais
    */
    $plugin_url = WP_PLUGIN_URL . '/gravapress';
    $options = array();
    $display_json = false;


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
    *   Página de configuração teste
    */
    function gravapress_options_page(){
        // Test to see if the user can manage the plugin
        if ( !current_user_can( 'manage_options' ) ) {
            wp_die( 'Acesso negado para essa página.' );
        }

        global $plugin_url;
        global $options;
        global $display_json;

        //Gravapress formulario de login
        if(isset($_POST['email_submitted'])){

        	$campo_hidden = esc_html( $_POST['email_submitted'] );

        	if ( $campo_hidden == 'Y') {

        		//usuario
        		$gravapress_email = esc_html( $_POST['gravatar_email'] );
        		//Gavatrar usuario hash email
        		$gravapress_email_hash = gravapress_email_hash( $gravapress_email );
        		//Perfil do usuario
        		$gravapress_profile = gravatar_get_profile( $gravapress_email_hash );

        		//Inserindo dados na tabela options UPDATE BANCO
        		$options['user_email'] = $gravapress_email;
        		$options['last_updated'] = time();
        		$options['gravapress_email_hash'] = $gravapress_email_hash;
        		$options['gravapress_profile'] = $gravapress_profile;

        		update_option( 'gravapress', $options );

        		

        	}
        }

        $options = get_option( 'gravapress' );

        if ($options != '') {
        	
        	$gravapress_email = $options['user_email'];
        	$gravapress_profile = $options['gravapress_profile'];
        }

		require('includes/options-page.php');
	}
	/*
	*	Hash do gravatar email de usuario
	*/
	function gravapress_email_hash( $gravapress_email ){

		//Criação do hash - https://pt.gravatar.com/site/implement/hash/
		$gravapress_email_hash = md5(strtolower( trim( $gravapress_email) ) );

		return $gravapress_email_hash;

	}
	/*
    *   Pega dados JSON do usuario no Gravatar
    */
    function gravatar_get_profile($gravapress_email_hash ){

    	$json_user_url = 'http://www.gravatar.com/' . $gravapress_email_hash . '.json';
    	$args = array( 'timeout' => 120 );

    	$json_feed = wp_remote_get( $json_user_url, $args);

    	$user_profile = json_decode( $json_feed['body'] );

    	return $user_profile;

    }

    /*
    *   chamando css
    */
    function gravapress_styles(){

    	wp_enqueue_style( 'gravapress_styles', plugins_url( 'gravapress/gravapress.css' ) );

    }
    add_action( 'admin_head', 'gravapress_styles' );


        class Gravapress_Widget extends WP_Widget {
        // Classe de widgets no wordpress

        function __construct() {
            // Instantiate the parent object
            parent::__construct(
                'Gravapress_Widget', // Base ID
                __('Gravapress'), // Name
                array( 'description' => __( 'Integração do Plugin Gravapress'), ) // Args
            );
        }

        function widget( $args, $instance ) {
            // Mostrar conteúdo no frontend do site
            extract($args); // extrair argumentos que são fornecidos ao widget
            $title = apply_filters( 'widget_title', $instance['title'] ); // título que aparecerá no topo do widget no frontend
            // a pessoa poderá personalizar o título

            // perfil armazenado do usuário que será exibido no frontend
            $options = get_option( 'gravapress' );
            $gravapress_profile = $options['gravapress_profile'];

            // template do frontend do site
            require( 'includes/front-end-widget.php' );
        }

        function update( $new_instance, $old_instance ) {
            // Salvar opções do widget definidas pelo usuário
            // Substitui as antigas opções por novas opções salvas pelo usuário para o widget
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);

            return $instance;
        }

        function form( $instance ) {
            // Exibição do widget no admin
            // Aparência do Widget na área administrativa do WP
            // Inicialmente a única coisa a ser feita é exibir um campo para alteração do título do widget
            $title = esc_attr( $instance['title'] ); // obter o título definido armazenado

            require( 'includes/widget-fields.php' );
        }
    }

    function myplugin_register_widgets() {
        // função que registra o widget no wordpress
        register_widget( 'Gravapress_Widget' );
    }

    add_action( 'widgets_init', 'myplugin_register_widgets' );  

?>