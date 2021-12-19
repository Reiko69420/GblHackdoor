<?php
include('../../../class/include.php');

if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
foreach ($GLOBALS['DB']->GetContent("channel_entries", ["forid" => "2"]) as $key) {
		$user = Account::GetUser(intval($key["byid"]));
        ?>
        <div class="channel_entry" id="entry_<?php echo $key["id"]; ?>">
          <h2><?php $user; ?></h2>
          <h4><?php echo nl2br($key["content"]); ?></h4>
        </div> <br />
        <?php
      }

?>

<div class="channel_add_entry">
	<div class="form-group">
    <label>Contenue</label>
    <textarea class="form-control" rows="1" id="channel_add_cracks" placeholder="Le programme super cool"></textarea>
    </div>
    <button onclick="sendChannel('channel_add_cracks', 'cracks')" type="button" class="btn btn-danger">Envoyer</button>
</div>
