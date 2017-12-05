<?php

$config = [
	'add_article_form' => [
							[	
								'field' => 'title',
								'label' => 'Article Title',
								'rules' => 'required|callback_alpha_dash'
							],
							[	
								'field' => 'body',
								'label' => 'Article Body',
								'rules' => 'required'
							]
						]
];