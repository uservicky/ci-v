<?php

class Admin extends My_Controller
{
    public function __construct() 
    {
        parent::__construct();
         if(! $this->session->userdata('userid'))
        {
           return redirect('user');
        }
        $this->load->model('admin_mdl');
    }

    private function _successRedirect($condition, $success_msg, $fail_msg)
    {
        if($condition)
        {
            $this->session->set_flashdata('feedback', $success_msg);
            $this->session->set_flashdata('feedback_class','success');
            
        }else {
            $this->session->set_flashdata('feedback', $fail_msg);
            $this->session->set_flashdata('feedback_class','danger');
        }
            return redirect('admin/dashboard');
    }

    public function dashboard()
    {
       
        $this->load->library('pagination');
        $config = [
                    'base_url' => base_url('admin/dashboard'),
                    'per_page' => 3,
                    'total_rows' => $this->admin_mdl->num_rows(),
                    'full_tag_open' => '<ul class="pagination">',
                    'full_tag_close'=> '</ul>',
                    'next_tag_open' => '<li>',
                    'next_tag_close'=> '</li>',
                    'prev_tag_open' => '<li>',
                    'prev_tag_close'=> '</li>',
                    'num_tag_open' => '<li>',
                    'num_tag_close'=> '</li>',
                    'cur_tag_open' => '<li class = "active"><a>',
                    'cur_tag_close'=> '</a></li>',
                    'first_tag_open' => '<li>',
                    'first_tag_close'=> '</li>',
                    'last_tag_open' => '<li>',
                    'last_tag_close'=> '</li>',  

                    ];
                    //print_r($this->uri->segment_array());
                    //it will print /language
                   // echo $this->uri->slash_segment(3,'both');
        $this->pagination->initialize($config);
        $articles = $this->admin_mdl->article_list($config['per_page'], $this->uri->segment(3));
        $this->load->view('./admin/dashboard',['articles'=>$articles]);
    }
    
    public function add_article()
    {
        $this->load->view('admin/add_article');
    }
    
    public function edit_article($article_id)
    { 
        $article = $this->admin_mdl->find_article($article_id);
        $this->load->view('admin/edit_article',['article' => $article,'article_id'=>$article_id]);
    }
    
    public function alpha_dash($str)
    {
            if (! preg_match("/^([a-zA-Z ])+$/i", $str))
            {
                    $this->form_validation->set_message('alpha_dash', 'The %s field can only conatins alphabets and space');
                    return false;
            }
            else
            {
                    return true;
            }
    }

    public function delete_article()
    {
        //unset($_POST['submit']);        print_r($this->input->post());
        $article_id = $this->input->post('article_id');
        return $this->_successRedirect(
                                $this->admin_mdl->delete_article($article_id),
                                'Article Deleted successfully',
                                'Article fail to update, pls try again...'
                            );   
    }

    public function update_article($article_id)
    {
        
        //if($this->form_validation->run('add_article_form'))
       // $this->form_validation->set_rules('title', 'Title', 'callback_alpha_dash');
         if($this->form_validation->run('add_article_form'))
        {
            $post = $this->input->post(); 
            //echo $article_id;
            return $this->_successRedirect(
                                $this->admin_mdl->update_article($article_id, $post),
                                'Article Updated successfully',
                                'Article fail to update, pls try again...'
                            );            
        }else
        {
            $this->edit_article($article_id);
            //$this->load->view("admin/edit_article");
        }
    }
    public function store_article()
    {
        $config=[
                'upload_path' => './uploads',
                'allowed_types' => 'gif|jpg|png|jpeg', 

        ];
        $this->load->library('upload',$config);

        if($this->form_validation->run('add_article_form') && $this->upload->do_upload('image'))
        {
           
            
            $post = $this->input->post();
            $data = $this->upload->data();
            $image_path = base_url('uploads/'.$data['raw_name'].$data['file_ext']);

            $post['image_path'] = $image_path;
            return $this->_successRedirect(
                                $this->admin_mdl->add_article($post),
                                'Article Added successfully',
                                'Article fail to add, pls try again...'
                            );    
        }else
        {
            $upload_error = $this->upload->display_errors();
            $this->load->view('admin/add_article',compact('upload_error'));
        }
    }
}