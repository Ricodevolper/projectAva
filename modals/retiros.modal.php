<div class="modal fade" id="retirosModal<?=$Cliente['id_cliente']?>" tabindex="-1"aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Depositos <?= $nombreCompleto ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-3">
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="widget-icon-2 bg-gradient-info text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                
                      </div>
                       </div>
                    <h5 class="my-3">Event</h5>
                  
                    <h4 class="mb-0" tittle = "Saldo Total" > $<?=number_format($saldoTotalEvent,2)?></h4><h6 class="ms-auto">Serie: A1 </h6>
                               <h5 class="mb-0 float-end " title="Numero de Contrato"  ><?=$saldoEvent[0]['num_contrato']?></h5>
                  </div>
                  <form action="depositos">
                  <button class="btn btn-sm btn-outline-primary float-end" >Agregar</button>
                  </form>  
                </div>
               
               </div>
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="widget-icon-2 bg-gradient-info text-white">

                     
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                         
                      </div>
                       </div>
                    <h5 class="my-3">Event</h5>
                  
                    <h4 class="mb-0" title = "Saldo Total" > $<?=number_format($saldoTotalEvent7,2)?></h4><h6 class="ms-auto">Serie: B3 </h6>
                               <h5 class="mb-0 float-end " title="Numero de Contrato"  ><?=$saldoEvent7[0]['num_contrato']?></h5>
                               <form action="">
                  <button class="btn btn-sm btn-outline-primary float-end" >Agregar</button>
                  </form>  
                  </div>
                   
                </div>
               </div>
               <div class="col">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="widget-icon-2 bg-gradient-danger text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                        
                      </div>
                     
                    </div>
                    <h5 class="my-3">Tiie</h5>
                    
                    <h5 class="mb-0" tittle = "Saldo Total" > $<?=number_format($tiee[0]['total_tiie'],2)?> </h5>
                                        <h5 class="mb-0 float-end " title="Numero de Contrato"  ><?=$tiee[0]['num_contrato_tiie']?></h5>
                                        <form action="">
                  <button class="btn btn-sm btn-outline-primary float-end" >Agregar</button>
                  </form>  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="widget-icon-2 bg-gradient-success text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                      </div>
                    <h5 class="my-3">Garant Mxn </h5>
                   
                    <h5 class="mb-0" tittle = "Saldo Total" > $<?=number_format($saldoTotalGarant,2)?> </h5>
                                    <h5 class="mb-0 float-end " title="Numero de Contrato"  ><?=$garant[0]['num_contrato']?></h5>
                                      </div>
                                      <form action="">
                  <button class="btn btn-sm btn-outline-primary float-end" >Agregar</button>
                  </form>
                </div>
               
               </div>
               <div class="col">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="widget-icon-2 bg-gradient-branding text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                      </div>
                    <h5 class="my-3">Garant Usd </h5>
                   
                    <h5 class="mb-0" tittle = "Saldo Total" > $<?=number_format($saldoTotalGarantUsd,2)?> </h5>
                                    <h5 class="mb-0 float-end " title="Numero de Contrato"  ><?=$garantUsd[0]['num_contrato']?></h5>
                                    </div>
                                    <form action="">
                  <button class="btn btn-sm btn-outline-primary float-end" >Agregar</button>
                  </form> 
                </div>
                 
               </div>
               
              
               <div class="col">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="widget-icon-2 bg-gradient-warning text-dark">
                      <i class="fadeIn animated bx bx-money"></i>
                      </div>
                         </div>
                    <h5 class="my-3">LQ</h5>
                    
                    <h4 class="mb-0" tittle = "Saldo Total" > $<?=number_format($saldoTotalLq1,2)?> </h4>
                                <h5 class="mb-0 float-end " title="Numero de Contrato"  ><?=$Lq1[0]['num_contrato']?></h5>
                                  </div>
                                  <form action="">
                  <button class="btn btn-sm btn-outline-primary float-end" >Agregar</button>
                  </form> 
                </div>
               
               </div>
              </div><!--end row-->
                          </div>
                            
                           
                          </div>
                        </div>
                      </div>