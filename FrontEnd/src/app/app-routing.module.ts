import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AddAddresseeComponent } from "./add-addressee/add-addressee.component";
import { TransferComponent } from "./transfer/transfer.component";
import { HistoryComponent } from "./history/history.component";
import { LoginComponent } from "./login/login.component";
import { RegisterComponent } from "./register/register.component";
import { ToastComponent } from './component/toast/toast.component';

const routes: Routes = [
  // {path: '',component: LoginComponent},
  {path: '',component: AddAddresseeComponent},
  {path: 'transfer',component: TransferComponent},
  {path: 'history',component: HistoryComponent},
  {path: 'register',component: RegisterComponent},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
