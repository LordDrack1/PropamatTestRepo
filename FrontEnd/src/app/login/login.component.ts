import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { LoginService } from '../shared/services/login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private loginService: LoginService,
    private router: Router) { }

  ngOnInit() {
  }
  ingresarCuenta(form:NgForm){
    let usuario = form.value;
    console.log(usuario)
    return this.loginService.ingresarCuenta(usuario)
  }
}
