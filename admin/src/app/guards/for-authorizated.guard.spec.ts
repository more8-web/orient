import { TestBed } from '@angular/core/testing';

import { ForAuthorizatedGuard } from './for-authorizated.guard';

describe('ForAuthorizatedGuard', () => {
  let guard: ForAuthorizatedGuard;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    guard = TestBed.inject(ForAuthorizatedGuard);
  });

  it('should be created', () => {
    expect(guard).toBeTruthy();
  });
});
