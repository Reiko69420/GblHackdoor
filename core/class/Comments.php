<?php
class Comments
{
	public function GetComments($to)
	{
		return $GLOBALS['DB']->GetContent("comment", ["toid" => $to], 'ORDER BY uploadtime DESC');
	}

	public function AddComment($to, $content)
	{
		$GLOBALS['DB']->Insert("comment", ["toid" => $to, "fromid" => $_SESSION["id"], "content" => $content, "uploadtime" => time()], true);
	}
	public function DelComment($id)
	{
		$GLOBALS['DB']->Delete("comment", ["id" => $id]);
	}
	public function GetComment($id)
	{
		return $GLOBALS['DB']->GetContent('comment', ['id' => $id])[0];
	}
}
?>