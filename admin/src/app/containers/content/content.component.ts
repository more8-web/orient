import { Component, OnInit } from "@angular/core";

import { Content } from "@context/models";
import { ContentDispatcher, ContentSelectors } from "@context/store/content";

@Component({
    selector: "app-content",
    templateUrl: "./content.component.html",
    styleUrls: ["./content.component.css"]
})
export class ContentComponent implements OnInit {

    contents: Content[];

    constructor(private selector: ContentSelectors,
                private dispatcher: ContentDispatcher) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.contents = [...data]);
    }
}
