import { Component, HostBinding, HostListener, Input, OnInit, ViewChild } from "@angular/core";
import { FormService } from "@app/services/form.service";

@Component({
    selector: "app-select",
    templateUrl: "./select.component.html",
    styleUrls: ["./select.component.css"]
})
export class SelectComponent implements OnInit {

    @Input() value: any;
    @Input() @HostBinding("class") classes;
    @Input() label: any;


    @ViewChild("select") select;

    @HostListener("change", ["$event.target.value"])
    onClick(inputValue) {
        this.formService.onClick(this.label, inputValue);
    }

    constructor(private formService: FormService) {
    }

    ngOnInit(): void {
    }

}
