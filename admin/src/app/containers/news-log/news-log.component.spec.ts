import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewsLogComponent } from './news-log.component';

describe('NewsLogComponent', () => {
  let component: NewsLogComponent;
  let fixture: ComponentFixture<NewsLogComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewsLogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewsLogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
