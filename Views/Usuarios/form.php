<input type="hidden" name="id" value="<?php echo $usuario->id_usuario ?? '' ?>">

<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="nombre" name="nombre" required="required" class="form-control " value="<?php echo $usuario->nombre_usuario ?? '' ?>">
  </div>
</div>

<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Correo <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="email" id="correo" name="correo" required="required" class="form-control " value="<?php echo $usuario->email ?? '' ?>">
  </div>
</div>


<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Rol <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <select class="form-control" name="selRol">

      <?php if (empty($usuario)) : ?>
        <option selected value="">Seleccione el rol</option>
        <?php foreach ($roles as $rol) : ?>
          <option value="<?php echo $rol->id ?>"> <?php echo $rol->nombre ?> </option>
        <?php endforeach ?>

      <?php else : ?>
        <option selected value="<?php echo $usuario->id ?>"> <?php echo $usuario->rol ?> </option>

        <?php foreach ($roles as $rol) : ?>
          <option value="<?php echo $rol->id ?>"> <?php echo $rol->nombre ?> </option>
        <?php endforeach ?>
      <?php endif; ?>

    </select>
  </div>
</div>

<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado del rol <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <select class="form-control" name="selStatus">

      <?php if ($usuario->is_activo === 1) : ?>
        <option selected value="1">Activo</option>
        <option value="0">Inactivo</option>
        <option value="1">Activo</option>
      <?php elseif ($usuario->is_activo === 0) : ?>
        <option selected value="o">Inactivo</option>
        <option value="0">Inactivo</option>
        <option value="1">Activo</option>
      <?php else : ?>
        <option selected value="">Seleccione estado</option>
        <option value="0">Inactivo</option>
        <option value="1">Activo</option>
      <?php endif ?>


    </select>
  </div>
</div>

<?php if (empty($usuario)) : ?>

  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Contraseña <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="password" id="password" name="password" required="required" class="form-control ">
    </div>
  </div>

  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Repetir Contraseña <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="password" id="repit-password" name="repit-password" required="required" class="form-control ">
    </div>
  </div>

<?php endif; ?>