import { TestBed } from '@angular/core/testing';

import { DestinatariosService } from './destinatarios.service';

describe('DestinatariosService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: DestinatariosService = TestBed.get(DestinatariosService);
    expect(service).toBeTruthy();
  });
});
