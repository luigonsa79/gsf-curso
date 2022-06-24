<input type="hidden" name="id" value="<?php echo $rol->id ?? '' ?>">

<fieldset>
  <div class="form-group">
    <label for="nombre">Nombre del Rol</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $rol->nombre ?? '' ?>">
  </div>

  <div class="form-group">
    <label for="nombre">Seleccione el estado para este Rol</label>
    <select id="activoRol" name="activoRol" class="form-control">
      <?php
      if (isset($rol)) {
        if ($rol->activo == 1)
          echo ' <option select value="1">Activo</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>';
        elseif ($rol->activo == 0) {
          echo ' <option select value="0">Inactivo</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>';
        }
      } else {
        echo ' <option select value="">Seleccione Rol</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>';
      }
      ?>


    </select>
  </div>
</fieldset>