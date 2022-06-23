<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'author', 'relase_year', 'price', 'stock', 'discount', 'book_category_id', 'release_year', 'cover'];
    protected $useSoftDeletes = true;

    public function getBook($slug = null)
    {
        // $query = $this->db->query("select * from book join book_category on book.book_category_id = book_category.book_category_id");
        // return $query->getResultArray();

        if ($slug === null) {
            $this->join('book_category', 'book.book_category_id = book_category.book_category_id')->where(['deleted_at' => null]);
            return $this->get()->getResultArray();
        } else {
            $this->join('book_category', 'book.book_category_id = book_category.book_category_id');
            $this->where(['slug' => $slug]);
            return $this->first();
        }
    }
}
