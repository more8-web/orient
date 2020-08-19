import {Component, EventEmitter, HostBinding, Input, OnInit, Output} from '@angular/core';

@Component({
  selector: 'app-textarea',
  templateUrl: './textarea.component.html',
  styleUrls: ['./textarea.component.css']
})
export class TextareaComponent implements OnInit {

    @Input() label: any;
    @Input() value: any;

    @Input() @HostBinding("class") classes;
    @HostBinding("class") localClasses = ["form-group"];

    @Output() formValue = new EventEmitter();

  constructor() { }

  ngOnInit(): void {
  }

    toForm(value) {
        this.formValue.emit(value);
    }

}
