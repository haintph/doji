<?php
class CommentController
{
  public function createComment()
  {
    $data = $_POST ?? null;
    (new Comment)->create($data);
   
    header("Location: ?ctl=details&id=$data[product_id]");
    exit();
  }
}
