<?php
class DB extends Conexion
{
    /**
     *
     * Listar registros desde la base de datos o un solo registro
     *
     */
    public static function listEqual($table, $params = [], $limit = null)
    {
        $cols_values = "";
        $limits = "";

        if (!empty($params)) {
            $cols_values .= "WHERE"; // SELECT * FROM roles WHERE id_rol = $_POST[textIdRol] LIMIT 1
            foreach ($params as $key => $value) {
                $cols_values .= " {$key} = :{$key} AND";
            }
            $cols_values = substr($cols_values, 0, -3);
        }

        if ($limit !== null) {
            $limits = " LIMIT {$limit}";
        }

        $stmt = "SELECT * FROM $table {$cols_values}{$limits}";

        // call base de datos el query
        if (!$rows = parent::query($stmt, $params)) {
            return false;
        }

        return $limit === 1 ? $rows[0] : $rows;
    }

    /**
     *
     * \JOIN
     *
     */
    public static function join($table1, $table2, $val1, $val2, $params = [], $limit = null)
    {
        $cols_values = "";
        $limits = "";

        if (!empty($params)) {
            $cols_values .= "WHERE"; // SELECT * FROM roles WHERE id_rol = $_POST[textIdRol] LIMIT 1
            foreach ($params as $key => $value) {
                $cols_values .= " {$key} = :{$key} AND";
            }
            $cols_values = substr($cols_values, 0, -3);
        }

        if ($limit !== null) {
            $limits = " LIMIT {$limit}";
        }
        /* SELECT * FROM productos
            INNER JOIN categorias
            ON productos.id_categoria_pro = categorias.id_cat
            WHERE producto.id_categoria_pro = 1 LIMIT 1
            ;*/
        $stmt = "SELECT * FROM $table1
                INNER JOIN $table2
                ON $table1.$val1 = $table2.$val2
                {$cols_values}{$limits}";

        // call base de datos el query
        if (!$rows = parent::query($stmt, $params)) {
            return false;
        }

        return $limit === 1 ? $rows[0] : $rows;
    }

    /**
     *
     * INSERTAR REGISTROS
     *
     */

    public static function insert($table, $params)
    {
        $cols = "";
        $placeholders = "";
        foreach ($params as $key => $value) { // INSERT INTO roles(name_rol,estado_rol) VALUES (:name_rol,:estado_rol)
            $cols .= "{$key} ,";
            $placeholders .= ":{$key} ,";
        }
        $cols = substr($cols, 0, -1);
        $placeholders = substr($placeholders, 0, -1);
        $stmt = "INSERT INTO {$table}({$cols}) VALUES ({$placeholders})";

        if ($id = parent::query($stmt, $params)) {
            return $id;
        } else {
            return false;
        }
    }

    /**
     *
     * UPDATE REGISTROS
     *
     */

    public static function update($table, $params = [], $id = [])
    {
        // UPDATE productos SET nameProducto=:nameproducto, stock=:stock WHERE idProducto = 1 AND status = 1 AND
        $cols = "";
        $placeholders = "";
        foreach ($params as $key => $value) {
            $placeholders .= " {$key} = :{$key} ,";
        }
        $placeholders = substr($placeholders, 0, -1);

        if (count($id) > 1) {
            foreach ($id as $key => $value) {
                $cols .= " $key = :$key AND";
            }
            $cols = substr($cols, 0, -3);
        } else {
            foreach ($id as $key => $value) {
                $cols .= " $key = :$key";
            }
        }

        $stmt = "UPDATE $table SET $placeholders WHERE $cols";
        if (!parent::query($stmt, array_merge($params, $id))) {
            return false;
        }

        return true;
    }

    public static function delete($table, $params = [], $limit = 1)
    {
        // DELETE FROM roles WHERE id_rol = :idrol AND status = :status LIMIT 1
        $cols_values = "";
        $limits = "";
        if (!empty($params)) {
            $cols_values .= "WHERE";
            foreach ($params as $key => $value) {
                $cols_values .= " {$key} = :{$key} AND";
            }
            $cols_values = substr($cols_values, 0, -3);
        }

        if ($limit !== null) {
            $limits = " LIMIT {$limit}";
        }

        $stmt = "DELETE FROM $table {$cols_values}{$limits}";

        if (!$row = parent::query($stmt, $params)) {
            return false;
        }

        return $row;
    }
}
