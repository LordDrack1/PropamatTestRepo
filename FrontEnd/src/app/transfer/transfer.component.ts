import { Component, OnInit, ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { FormsModule, FormGroup, FormControl, NgForm } from '@angular/forms';
import { DestinatariosService } from '../shared/services/destinatarios.service';
import { TransferenciasService } from '../shared/services/transferencias.service';

@Component({
  selector: 'app-transfer',
  templateUrl: './transfer.component.html',
  styleUrls: ['./transfer.component.css']
})
export class TransferComponent implements OnInit {
  destinatarios:any;
  @ViewChild('form',{static: true}) form: NgForm;
  destinatario2 ={
    id:null,
    nombre:null,
    correo:null,
    banco:null,
    tipo_cuenta:null
  }

  constructor(private destinatariosService: DestinatariosService,
    private transferenciasService: TransferenciasService,
    private router: Router) {
      
     }

  ngOnInit() {
    this.getDestinatarios();
  }

  crearTransferencia(form:NgForm){
    let transferencia = form.value;
    console.log(transferencia);
    if(transferencia.Monto <= 0 || transferencia.Monto == null){
      console.log("El monto debe ser mayor a 0");
    }else{
      return this.transferenciasService.crearTransferencia(transferencia);
    }
    
  }

  getDestinatarios(){
    this.destinatariosService.getDestinatarios().subscribe((res:any)=>{
      this.destinatarios = res;
    })
  }

  getDestinatario(idDestinatario){
    this.destinatariosService.getDestinatario(idDestinatario).subscribe((res:any)=>{
      this.destinatario2 = res;
      this.form.setValue({
        'Nombre': this.destinatario2[0].nombre,
        'Correo': this.destinatario2[0].correo,
        'Banco': this.destinatario2[0].banco_destino,
        'TipoCuenta': this.destinatario2[0].tipo_cuenta,
        'Rut':this.destinatario2[0].rut,
        'Monto':''
      });
    })
  }
}