<table>
<tr>
<td>Celda 1</td>
<td>Celda 2</td>
<td>Celda 3</td>
</tr>
<tbody>
<?php foreach($algunosDatos as $fila): ?>
  <tr>
    <?php foreach($fila as $dato): ?>
      <td><?php echo $dato; ?></td>
    <?php endforeach; ?>
  </tr>
<?php endforeach; ?>
</tbody>
</table>