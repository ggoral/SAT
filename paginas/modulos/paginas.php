<div class="pagination" align="center">
  <ul>
   <?php   for ($i = 0; $i < $max_num_paginas; $i++){   ?>
   <li class="<?php echo ($page == ($i + 1)) ? 'active' : ''; ?>"><a href="listar.php?pg=<?php echo ($i + 1).$linkfiltro; ?>"><?php echo ($i + 1) ?></a></li>  
   <?php } ?>   
  </ul>
</div>

                