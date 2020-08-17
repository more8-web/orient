import { Component, OnInit } from '@angular/core';
import { FormBuilder } from "@angular/forms";

@Component({
  selector: 'app-page-form',
  templateUrl: './page-form.component.html',
  styleUrls: ['./page-form.component.css']
})
export class PageFormComponent implements OnInit {
    pageForm = this.fb.group({
       alias: [""],
        url: [""],
        template: [""],
    });

  constructor(private fb: FormBuilder) { }

  ngOnInit(): void {
  }


}
