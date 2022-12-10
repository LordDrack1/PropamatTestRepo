import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';


import {NgbModule} from '@ng-bootstrap/ng-bootstrap'
import {HttpClientModule} from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { AddAddresseeComponent } from './add-addressee/add-addressee.component';
import { TransferComponent } from './transfer/transfer.component';
import { HistoryComponent } from './history/history.component';
import { NavbarComponent } from './component/navbar/navbar.component';
import { RegisterComponent } from './register/register.component';
import {ReactiveFormsModule,FormsModule, FormGroup } from '@angular/forms';
import { ToastComponent } from './component/toast/toast.component';
import { ToastrModule } from 'ngx-toastr';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    AddAddresseeComponent,
    TransferComponent,
    HistoryComponent,
    NavbarComponent,
    RegisterComponent,
    ToastComponent
  ],
  imports: [
    BrowserModule,
    NgbModule,
    AppRoutingModule,
    ReactiveFormsModule,
    FormsModule,
    HttpClientModule,
    BrowserAnimationsModule,
    ToastrModule.forRoot(),

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
