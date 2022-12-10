import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { TransferenciasService } from '../shared/services/transferencias.service';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.css']
})
export class HistoryComponent implements OnInit {
  transferencias:any;

  constructor(
    private transferenciasService: TransferenciasService,
    private router: Router) { }

  ngOnInit() {
    this.getTransferencias();
  }

  getTransferencias(){
    this.transferenciasService.getTransferencias().subscribe((res:any)=>{
      this.transferencias = res;
    })
  }

}
