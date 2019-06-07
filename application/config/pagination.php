<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = [
  'page_query_string' => TRUE,
  'full_tag_open' => '<ul class="pagination justify-content-center">',
  'full_tag_close' => '</ul>',
  'first_link' => FALSE,
  'last_link' => FALSE,
  'prev_link' => '<i class="fas fa-chevron-left"></i>',
  'prev_tag_open' => '<li class="page-item">',
  'prev_tag_close' => '</li>',
  'next_link' => '<i class="fas fa-chevron-right"></i>',
  'next_tag_open' => '<li class="page-item">',
  'next_tag_close' => '</li>',
  'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
  'cur_tag_close' => '</span></li>',
  'attributes' => ['class' => 'page-link']
];
