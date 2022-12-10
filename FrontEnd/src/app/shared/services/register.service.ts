import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class RegisterService {

  constructor(private http:HttpClient) { }

  crearCuenta(body:any){
      return this.http.post(environment.url+ 'api/register',body , {responseType :'text'})
      .toPromise().then((data:any)=>{
        console.log(data);
      })
  }
}