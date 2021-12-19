<?php include('isdefault.php') ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                              <div class="form-group">
                                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary">Obfuscateur XOR (Pour vos codes LUA)</h4>
                </div>
                <label>Code Lua</label>
                <textarea class="form-control" rows="5" id="obfuscation-text" placeholder="Code lua"></textarea>
              </div>
              <button type="button" onclick="obfuscate()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Obscursir le code</button>
        </div>
      </font>

      <!-- <font color="white">
                              <div class="form-group">
                                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary">Obfuscateur XOR (Pour vos codes LUA)</h4>
                </div>
                <label>Code Lua</label>
                <textarea class="form-control" rows="5" id="lua" placeholder="Code lua"></textarea>
              </div>
              <button type="button" onclick="xor()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Obscursir le code</button>
        </div>
      </font> -->

      <div class="breadcome-list"><font color="white">
                              <div class="form-group">
                                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary">De-obfuscation XOR (Pour des codes LUA)</h4>
                </div>
              <div class="form-group">
                <label>Code</label>
                <textarea class="form-control" rows="5" id="deobfuscation-text" placeholder="Codes lua"></textarea>
              </div>
              <button type="button" onclick="deobfuscate()" class="btn btn-success"><i class="fas fa-trash"></i>&nbsp;Dé-obfusquer</button>
            </font>
          </div>
        </font>
      </div>
      <?php 
        // if (isset($_POST["revers"])){
        //   $reverse = strrev($_POST["reverscode"]);
        // }
      ?>

      <div class="breadcome-list"><font color="white">

      <div class="form-group">
        <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Advanced XOR (BETA)</h4>
      </div>
      <div class="form-group">
      <label>Code</label>
      <textarea class="form-control" rows="5" id="lua" placeholder="Codes lua"></textarea>
      </div>
      <button type="button" onclick="xor()"  class="btn btn-success"><i class="fas fa-trash"></i>&nbsp;Obscursir le code</button> 
      </font>
      </div>

      </font>
      </div>

      
      <script>
        function reverse()
{
    var code = $("#reverscode").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/reverse.php",
      data: { code: code }
    }).done(function(data){
        $("#reverscode").val(data);
    });
}
      </script>

        <?php
          function Hex2String($hex){
            $string='';
            for ($i=0; $i < strlen($hex)-1; $i+=2){
                $string .= chr(hexdec($hex[$i].$hex[$i+1]));
            }
            return $string;
        }
        if (isset($_POST["hex"])){
          $hx = Hex2String($_POST["hexcode"]);
        }
        ?>

      <div class="breadcome-list"><font color="white">
   

      <div class="form-group">
      <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary">Hex </h4>
                 </div>
    
          <label style="color:white;">Obfuscateur HEX (Pour vos codes LUA)</label>
                <textarea class="form-control" rows="5" id="text" name="hexcode" placeholder="Text"></textarea>
          </div>
          <button type="submit" onclick="texttohex()" name="hex" class="btn btn-success"><i class="fas fa-trash"></i>&nbsp;Obfusquer</button> <br /><br />


                              <div class="form-group">
                              
              <div class="form-group">
                <label>De-obfuscation HEX</label>
                <textarea class="form-control" rows="5" id="hex" name="hexcode" placeholder="Codes Hex"></textarea>
              </div>
              <button type="submit" onclick="hex()" name="hex" class="btn btn-success"><i class="fas fa-trash"></i>&nbsp;Dé-obfusquer</button> 
            </font>
          </div>

          
        </font>
      </div>

      <script>
        function hex()
{
    var code = $("#hex").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/hex.php",
      data: { code: code }
    }).done(function(data){
        $("#hex").val(data);
    });
}

function texttohex()
{
    var code = $("#text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/hexo.php",
      data: { code: code }
    }).done(function(data){
        $("#text").val(data);
    });
}
function xor()
{
    var code = $("#lua").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/xor.php",
      data: { code: code }
    }).done(function(data){
        $("#lua").val(data);
    });
}
      </script>
      
                                    <div class="breadcome-list"><font color="white">
                              <div class="form-group">
                                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary">GBackdoor Fucker</h4>
                </div>
              <div class="form-group">
                <label>Lien du stage2</label>
                <textarea class="form-control" rows="1" id="fucker-text" placeholder="http://exemple.com/core/stage2.php"></textarea>
              </div>
              <button type="button" onclick="fucklerle()" class="btn btn-success"><i class="fas fa-trash"></i>&nbsp;Niquer le gbackdoor</button>
            </font>
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


<script>
function deobfuscate()
{
    var code = $("#deobfuscation-text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/deobfuscate.php?key=",
      data: { code: code }
    }).done(function(data){
        $("#deobfuscation-text").val(data);
    });
}


</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>
