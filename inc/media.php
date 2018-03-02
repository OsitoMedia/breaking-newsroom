<?php
// Register Custom Post Type
function multimedia() {

	$labels = array(
		'name'                  => _x( 'Multimedia', 'Post Type General Name', 'nacionelectrica' ),
		'singular_name'         => _x( 'Multimedia', 'Post Type Singular Name', 'nacionelectrica' ),
		'menu_name'             => __( 'Multimedia', 'nacionelectrica' ),
		'name_admin_bar'        => __( 'Multimedia', 'nacionelectrica' ),
		'archives'              => __( 'Archivos', 'nacionelectrica' ),
		'attributes'            => __( 'Atributos', 'nacionelectrica' ),
		'parent_item_colon'     => __( 'Padre:', 'nacionelectrica' ),
		'all_items'             => __( 'Todos', 'nacionelectrica' ),
		'add_new_item'          => __( 'Agregar nuevo', 'nacionelectrica' ),
		'add_new'               => __( 'Agregar nuevo', 'nacionelectrica' ),
		'new_item'              => __( 'Nuevo', 'nacionelectrica' ),
		'edit_item'             => __( 'Editar', 'nacionelectrica' ),
		'update_item'           => __( 'Actualizar', 'nacionelectrica' ),
		'view_item'             => __( 'Ver', 'nacionelectrica' ),
		'view_items'            => __( 'Ver', 'nacionelectrica' ),
		'search_items'          => __( 'Buscar', 'nacionelectrica' ),
		'not_found'             => __( 'No se encuentra', 'nacionelectrica' ),
		'not_found_in_trash'    => __( 'No hay nada en la papelera', 'nacionelectrica' ),
		'featured_image'        => __( 'Imagen destacada', 'nacionelectrica' ),
		'set_featured_image'    => __( 'Seleccionar como imagen destacada', 'nacionelectrica' ),
		'remove_featured_image' => __( 'Quitar imagen destacada', 'nacionelectrica' ),
		'use_featured_image'    => __( 'User como imagen destacada', 'nacionelectrica' ),
		'insert_into_item'      => __( 'Insertar', 'nacionelectrica' ),
		'uploaded_to_this_item' => __( 'Subir', 'nacionelectrica' ),
		'items_list'            => __( 'Lista', 'nacionelectrica' ),
		'items_list_navigation' => __( 'Items list navigation', 'nacionelectrica' ),
		'filter_items_list'     => __( 'Filter items list', 'nacionelectrica' ),
	);
	$args = array(
		'label'                 => __( 'Multimedia', 'nacionelectrica' ),
		'description'           => __( 'Videos', 'nacionelectrica' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'multimedia',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'media', $args );

}
add_action( 'init', 'multimedia', 0 );
?>