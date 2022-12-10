import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class BancosService {

  constructor(private httpClient: HttpClient) { }

  getBancos(){
    return this.httpClient.get(environment.url+ 'api/banks')
  }
}
