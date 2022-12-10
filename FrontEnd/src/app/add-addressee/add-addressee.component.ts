import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { BancosService } from '../shared/services/bancos.service';
import { DestinatariosService } from '../shared/services/destinatarios.service';

@Component({
  selector: 'app-add-addressee',
  templateUrl: './add-addressee.component.html',
  styleUrls: ['./add-addressee.component.css']
})
export class AddAddresseeComponent implements OnInit {

  bancos:any;

  constructor(
    private destinatariosService: DestinatariosService,
    private router: Router,
    private bancosService: BancosService,private toastr: ToastrService
  ) { }

  ngOnInit() {
    this.getBancos();
  }

  crearDestinatario(form:NgForm){
    let destinatario = form.value;
    console.log(destinatario)
    return this.destinatariosService.crearDestinatario(destinatario)
  }

  getBancos(){
    this.bancosService.getBancos().subscribe((res:any)=>{
      console.log(res);
      this.bancos = res;
    })
  }

}
