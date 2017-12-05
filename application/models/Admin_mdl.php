<?php
class Admin_mdl extends CI_Model
{
   
    public function article_list($limit, $offset)
    {
        //echo $offset;
        $user_id = $this->session->userdata('userid');
        $articles = $this->db
                        ->select(['title','id','c_date'])
                        ->from('articles')
                        ->where('user_id', $user_id)
                        ->limit($limit, $offset)
                        ->get();
                        //echo '<pre>';
       //print_r ( $articles->result());
       return ( $articles->result());
      // exit;
    }
    public function search($query, $limit, $offset)
    {
        $q = $this->db->from('articles')
                        ->like('title', $query)
                        ->limit($limit, $offset)
                        ->get();
        return $q->result();
    }
    public function countSeachArticles($query)
    {
        $articles = $this->db
                        ->like('title',$query)
                        ->from('articles')
                        ->get();
        return  $articles->num_rows();

    }
    public function all_article_list($limit, $offset)
    {
        $articles = $this->db
                        //->select(['title','id'])
                        ->from('articles')
                        ->limit($limit, $offset)
                        ->order_by('c_date','DESC')
                        ->get();
        return ( $articles->result());
    }

    public function find($id)
    {
        $q = $this->db->from('articles')
                    ->where(['id' => $id])
                    ->get();
        if($q->num_rows())
        {
            return $q->row();
        }
        return false;
    }

    public function countAllArticles()
    {
        $articles = $this->db
                        ->select(['title','id'])
                        ->from('articles')
                        ->get();
        return  $articles->num_rows();

    }
     
    public function num_rows()
    {
        $user_id = $this->session->userdata('userid');
        $articles = $this->db
                        ->select(['title','id'])
                        ->from('articles')
                        ->where('user_id', $user_id)
                        ->get();
        return  $articles->num_rows();

    }
    public function add_article($data)
    {
        return $this->db->insert('articles',$data);
    }

    public function find_article($article_id)
    {
        $q = $this->db->select(['id','title','body'])
                        ->where('id',$article_id)
                        ->get('articles');
        return $q->row();
    }
    public function update_article($article_id, $articles)
    {
        
        return $this->db
                    ->where('id', $article_id)
                    ->update('articles',$articles);
    }
    public function delete_article($article_id)
    {
        
        return $this->db->delete('articles',['id' => $article_id]);
    }

}