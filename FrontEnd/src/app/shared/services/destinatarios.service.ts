import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class DestinatariosService {

  constructor(private http:HttpClient) { }

  crearDestinatario(body:any){
    return this.http.post(environment.url+ 'api/agregarDestinatario',body , {responseType :'text'})
    .toPromise().then((data:any)=>{
      console.log(data);      
    })
  }

  getDestinatarios(){
    return this.http.get(environment.url+ 'api/destinatarios')
  }

  getDestinatario(idDestinatario:number){
    return this.http.get(environment.url+ `api/destinatario/${idDestinatario}`)
  }
}
