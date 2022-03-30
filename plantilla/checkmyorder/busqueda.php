<?php 
    defined('SS_NYAA') or die; 
    $csHabitacion = new ClsHabitacion();
    $csHabitacionCategoria = new ClsHabitacionCategoria();
    $ObjFotoHabitacion = new ClsHabitacionFoto();

    $entrada = ($_GET['fecha_entrada']);
    $salida = ($_GET['fecha_salida']);
    $entrada_ = explode('/',$entrada);
    $salida_ = explode('/',$salida);
    $GET_fecha_entrada = $entrada_[2].'-'.$entrada_[1].'-'.$entrada_[0];
    $GET_fecha_salida = $salida_[2].'-'.$salida_[1].'-'.$salida_[0];
?>
<section  class="RoomsGridstyles__Wrapper-sc-16s5weo-2 ksBqRC">
  <h2  class="RoomsGridstyles__Header-sc-16s5weo-0 fLDQuZ"></h2>
  <section  class="RoomsGridSectionstyles__Wrapper-jsch8l-1 eSyfOd">
    <p class="Noticestyles__Wrapper-sc-1l2bpf5-1 fCISXO"  type="0">
      <svg x="0px" y="0px" viewBox="0 0 18 18" width="18px" height="18px"  class="Iconstyles__Icon-sc-14p5f4o-0 fnRFfc">
        <circle cx="9" cy="9" r="9" fill="#1F6231"></circle>
        <polyline points="5,10.2 7.7,12.5 13,6.6 " fill="none" stroke="#DFEECE" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
      </svg>
      <span  class="Noticestyles__Text-sc-1l2bpf5-0 bTPjbh">Mostramos la disponibilidad de de habitaciones del <b><?php echo $entrada;?></b> al <b><?php echo $salida;?></b>.</span>
    </p>
    <ul class="RoomsGridSectionstyles__List-jsch8l-0 cmgAyV" id="lista-habitaciones">
    </ul>
  </section>
  <button  type="button" class="RoomsGridstyles__MoreButton-sc-16s5weo-1 fIVDiT">Mas Habitaciones</button>
</section>