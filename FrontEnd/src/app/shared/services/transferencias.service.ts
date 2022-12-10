import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class TransferenciasService {

  constructor(private http:HttpClient) { }

  crearTransferencia(body:any){
    return this.http.post(environment.url+ 'api/transferir',body , {responseType :'text'})
    .toPromise().then((data:any)=>{
      console.log(data);
    })
  }

  getTransferencias(){
    return this.http.get(environment.url+ 'api/transferencias')
  }
}
