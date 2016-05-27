<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of index
 *
 * @author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * @date May 24, 2016
 * 
 */
$title = 'My albums';
 $this->headTitle($title);
 ?>
 <h1><?php echo $this->escapeHtml($title); ?></h1>

 <table class="table">
 <tr>
     <th>Nome</th>
     <th>Telefone</th>
 </tr>
 <?php foreach ($users as $user) : ?>
 <tr>
     <td><?php echo $this->escapeHtml($user->nome);?></td>
     <td><?php echo $this->escapeHtml($user->telefone);?></td>
 </tr>
 <?php endforeach; ?>
 </table>