<?php
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){?>
  <form class="" action="../controller/c_comentario.php" method="post">
    <div class="row container centered row p-3 my-3 bg-dark text-white comentario">
      <div class="col-8">
        <input type="hidden" name="habilitado" value="<?php echo $id_habilitado?>">
        <input type="hidden" name="usuario" value="<?php echo $id_m?>">
        <div class="container">
          <div class="row">
            <div class="col">
              <textarea class="form-control" name="comentario" placeholder="Digite seu comentario" id="exampleFormControlTextarea1" rows="3"></textarea>
              <label class="sr-only" for="inlineFormInputGroupUsername2">nome de usuario</label>
            </div>

          </div>
        </div>

      </div>
      <div class="col-4">
        <!--nota-->
        <div class="col">
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text">@ <?php echo $_SESSION['nome']; ?></div>
            </div>

          </div>
          <div class="form-check ">
            <div class="estrelas">
            <input type="radio" id="cm_star-empty" name="fb" value="0" checked/>
            <label for="cm_star-1"><i class="fa"></i></label>
            <input type="radio" id="cm_star-1" name="fb" value="1"/>
            <label for="cm_star-2"><i class="fa"></i></label>
            <input type="radio" id="cm_star-2" name="fb" value="2"/>
            <label for="cm_star-3"><i class="fa"></i></label>
            <input type="radio" id="cm_star-3" name="fb" value="3"/>
            <label for="cm_star-4"><i class="fa"></i></label>
            <input type="radio" id="cm_star-4" name="fb" value="4"/>
            <label for="cm_star-5"><i class="fa"></i></label>
            <input type="radio" id="cm_star-5" name="fb" value="5"/>
            <button type="submit" class="btn btn-primary mb-2" >Envia</button>
          </div>
          </div>
        </div>
        <!--fim nota-->
      </div>
    </div>
    </form>
<?php }?>
