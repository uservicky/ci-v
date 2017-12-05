<?php
class User extends My_Controller
{
    
    public function index()
    {    
        if($this->session->userdata('userid'))
        {
           return redirect('admin/dashboard');
        }
        
        $this->load->helper('form');
        $this->load->model('admin_mdl');

        $this->load->library('pagination');
        $config = [
                    'base_url' => base_url('user/index'),
                    'per_page' => 3,
                    'total_rows' => $this->admin_mdl->countAllArticles(),
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
        $articles = $this->admin_mdl->all_article_list($config['per_page'], $this->uri->segment(3));

        $this->load->view('./public/articles_list',compact('articles'));
       
    }

    public function search()
    {
        $this->form_validation->set_rules('query','Query','required');
        if(! $this->form_validation->run())
        {
            $this->index();
        }
        else{
            $query = $this->input->post('query');
            return redirect("user/search_result/".$query);
            /*$this->load->model('admin_mdl');
            $articles = $this->admin_mdl->search($query);
            $this->load->view('public/search',['articles'=>$articles]);*/
        }
    }

    public function search_result($query)
    {
        $this->load->model('admin_mdl');

        $this->load->library('pagination');
        $config = [
                    'base_url' => base_url('user/search_result/'.$query),
                    'per_page' => 3,
                    'total_rows' => $this->admin_mdl->countSeachArticles($query),
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
        $articles = $this->admin_mdl->search($query, $config['per_page'], $this->uri->segment(4));
        $this->load->view('public/search',['articles'=>$articles]);
    }
    public function article($id)
    {
        $this->load->model('admin_mdl');
        $article = $this->admin_mdl->find($id);
        $this->load->view('public/articles_details',['article'=>$article]);
    }
    public function login_page()
    {
         $this->load->view('./public/login');
    }
   
    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname', 'User Name','required|alpha|trim');
        $this->form_validation->set_rules('pword', 'Pasword','required');
        
        if($this->form_validation->run())
        {
            $uname = $this->input->post('uname');
            $pword = $this->input->post('pword');
            
            $this->load->model('model1');
            $id = $this->model1->getLogi($uname, $pword);
            if($id)
            {
                $this->load->library('session');
                $this->session->set_userdata('userid',$id);
                return redirect('admin/dashboard');
                 //$this->load->view('./admin/dashboard');
              //  echo 'success<br/>';
             //   echo "Username: {$uname}<br/> Password: {$pword}";
            }else
            {
                $this->session->set_flashdata('login_failed','username/password is wrong');
              return redirect('user');
            }
        }
        else
        {
            $this->load->view('./public/articles_list');
            //echo 'failed';
            //echo validation_errors();
        }
    }
    
    public function logout()
    {
         
                $this->session->unset_userdata('userid');
                return redirect('user');
        
    }
    
}