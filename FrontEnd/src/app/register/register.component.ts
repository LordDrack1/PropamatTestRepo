import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { RegisterService } from '../shared/services/register.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  constructor(private registerService: RegisterService,
              private router: Router) { }

  ngOnInit() {
  }

  crearCuenta(form:NgForm){
    let usuario = form.value;
    console.log(usuario)
    return this.registerService.crearCuenta(usuario)
  }
}
