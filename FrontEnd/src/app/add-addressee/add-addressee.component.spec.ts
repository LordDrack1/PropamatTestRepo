import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddAddresseeComponent } from './add-addressee.component';

describe('AddAddresseeComponent', () => {
  let component: AddAddresseeComponent;
  let fixture: ComponentFixture<AddAddresseeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddAddresseeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddAddresseeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
