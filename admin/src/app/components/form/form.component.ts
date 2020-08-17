import {
    Component,
    ComponentFactoryResolver,
    ComponentRef,
    HostBinding, HostListener,
    Input, OnChanges, OnDestroy,
    SimpleChanges,
    Type,
    ViewChild,
    ViewContainerRef
} from "@angular/core";
import { InputComponent } from "@components/form/input";
import { FormSchema } from "@components/form/form.types";
import { FormService } from "@app/services/form.service";

@Component({
    selector: "app-form",
    templateUrl: "./form.component.html",
    styleUrls: ["./form.component.css"]
})
export class FormComponent implements OnChanges, OnDestroy {

    @Input() schema: FormSchema;
    @Input() values: object;

    @ViewChild("form", {read: ViewContainerRef}) form;
    @HostBinding("class") readonly classes = "form";


    constructor(private resolver: ComponentFactoryResolver,
                private formService: FormService) {

    }

    ngOnChanges(changes: SimpleChanges): void {

        this.clicked();

        if (this.form && this.values) {
            this.form.clear();

            let factory;
            this.schema.fields.forEach(schemaField => {
                factory = this.resolver.resolveComponentFactory(schemaField.component as Type<any> || InputComponent);
                const field: ComponentRef<any> = this.form.createComponent(factory);

                field.instance.classes = schemaField.classes;
                field.instance.value = this.values[schemaField.property];
                field.instance.label = schemaField.label;

                // console.log(this.values[schemaField.property]);

                field.changeDetectorRef.detectChanges();

            });
        }
    }

    clicked() {
        this.formService.status().subscribe(value => {
            if (value) {
                this.formService.fromClick().subscribe(data => {
                    console.log(data);
                });
            }
        });
    }

    ngOnDestroy(): void {
        this.form.clear();
        this.formService.clear();
    }
}
